<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Vendor;
use App\Models\ProductType;
use App\Models\ProductGroup;
use App\Models\Brand;
use App\Models\VehicleMaker;
use App\Models\VehicleModel;
use App\Models\StockInProduct;
use App\Models\StockOutProduct;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::with(['category', 'subCategory', 'brand'])->orderBy('status', 'asc')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
    	$categoryList = Category::pluck('name', 'id');
    	$vendorList = Vendor::pluck('name', 'id');
        $productTypeList = ProductType::pluck('name', 'id');
        $productGroupList = ProductGroup::pluck('name', 'id');
        $brandList = Brand::pluck('name', 'id');
        $vehicleMakerList = VehicleMaker::pluck('name', 'id');
        $vehicleModelList = VehicleModel::pluck('name', 'name');
        return view('product.create', compact('categoryList', 'vendorList', 'productTypeList', 'productGroupList', 'brandList', 'vehicleMakerList', 'vehicleModelList'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'vendor_price' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'vendor_id' => 'required',
            'cover_img' => 'required',
            // 'cover_img' => 'mimes:jpeg,jpg,png,gif',
            // 'images.*' => 'mimes:jpeg,jpg,png,gif'
        ];
        $messages = [
            'name.required' => 'The Product field is required.',
            'category_id.required' => 'The Category field is required.',
            'sub_category_id.required' => 'The Sub Category field is required.',
            'vendor_id.required' => 'The Vendor field is required.',
        ];
        $images = [];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->except(['category_id', 'vehicle_maker_id']));
        }

        if ($request->applicable_vehicle_models == null) {
            $checkApplicable = '[]';
        } else {
            $str2VehicleModels = implode(", ",$request->applicable_vehicle_models);
            $checkApplicable = '['.$str2VehicleModels.']';
        }

        $productExist = Product::with(['category', 'subCategory'])->where('name', $request->name)->where('category_id', $request->category_id)->where('sub_category_id', $request->sub_category_id)->where('applicable_vehicle_models', $checkApplicable)->where('start_year', $request->start_year)->where('end_year', $request->end_year)->where('chassis_code', $request->chassis_code)->where('chassis_type', $request->chassis_type)->first();
        if($productExist) {
            flash()->error('Product '.$productExist->name.' in Category '.$productExist->category->name.' & Sub Category '.$productExist->subCategory->name.' already exist in selected Models between '.$productExist->start_year.' ~ '.$productExist->end_year.' with same Chassis Code & Type');
            return redirect()->back()->withInput($request->except(['category_id', 'vehicle_maker_id']));
        }

        $product = new Product;
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->vendor_price = $request->vendor_price;
        $product->selling_price = $request->selling_price;
        $product->pre_order = $request->pre_order;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->vendor_id = $request->vendor_id;
        $product->product_type_id = $request->product_type_id;
        $product->product_group_id = $request->product_group_id;
        $product->brand_id = $request->brand_id;
        $product->small_description = $request->small_description;
        $product->detail_description = $request->detail_description;
        $product->vehicle_maker_id = $request->vehicle_maker_id;

        if ($request->applicable_vehicle_models == null) {
            $product->applicable_vehicle_models = '[]';
        } else {
            $strVehicleModels = implode(", ",$request->applicable_vehicle_models);
            $product->applicable_vehicle_models = '['.$strVehicleModels.']';
        }

        $product->start_year = $request->start_year;
        $product->end_year = $request->end_year;
        $product->chassis_code = $request->chassis_code;
        $product->chassis_type = $request->chassis_type;

        if ($request->file('cover_img')->isValid()) {
            $destinationPath = public_path('uploads/');
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            $fileName = 'Product_'.date("Y-m-d_H-i-s").'_'.rand(11111, 99999) . '.' . $extension;
            $request->file('cover_img')->move($destinationPath, $fileName);
        } else {
            flash()->error('File is not valid');

            return redirect()->back()->withInput();
        }

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $image = 'Product_detail_'.date("Y-m-d_H-i-s").'_'.rand(11111, 99999).'.'.$file->extension();
                $file->move(public_path().'/uploads/', $image);  
                $images[] = $image;
            }
        }

        $product->cover_img = $fileName;
        $product->images = json_encode($images);
        $product->created_by = Auth::id();
        $product->save();
        flash()->success($product->name.' Product created successfully');
        return redirect('product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categoryList = Category::pluck('name', 'id');
        $vendorList = Vendor::pluck('name', 'id');
        $productTypeList = ProductType::pluck('name', 'id');
        $productGroupList = ProductGroup::pluck('name', 'id');
        $brandList = Brand::pluck('name', 'id');
        $vehicleMakerList = VehicleMaker::pluck('name', 'id');
        $vehicleModelList = VehicleModel::pluck('name', 'name');
        return view('product.edit', compact('product', 'categoryList', 'vendorList', 'productTypeList', 'productGroupList', 'brandList', 'vehicleMakerList', 'vehicleModelList'));
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'vendor_price' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'vendor_id' => 'required',
            // 'images.*' => 'mimes:jpeg,jpg,png,gif'
        ];
        $messages = [
            'name.required' => 'The Product field is required.',
            'category_id.required' => 'The Category field is required.',
            'sub_category_id.required' => 'The Sub Category field is required.',
            'vendor_id.required' => 'The Vendor field is required.',
        ];
        $images = [];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->applicable_vehicle_models == null) {
            $checkApplicable = '[]';
        } else {
            $str2VehicleModels = implode(", ",$request->applicable_vehicle_models);
            $checkApplicable = '['.$str2VehicleModels.']';
        }

        $productExist = Product::with(['category', 'subCategory'])->where('id', '<>', $product->id)->where('name', $request->name)->where('category_id', $request->category_id)->where('sub_category_id', $request->sub_category_id)->where('applicable_vehicle_models', $checkApplicable)->where('start_year', $request->start_year)->where('end_year', $request->end_year)->where('chassis_code', $request->chassis_code)->where('chassis_type', $request->chassis_type)->first();
        if($productExist) {
            flash()->error('Product '.$productExist->name.' in Category '.$productExist->category->name.' & Sub Category '.$productExist->subCategory->name.' already exist in selected Models between '.$productExist->start_year.' ~ '.$productExist->end_year.' with same Chassis Code & Type');
            return redirect()->back()->withInput();
        }

        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->vendor_price = $request->vendor_price;
        $product->selling_price = $request->selling_price;
        $product->pre_order = $request->pre_order;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->vendor_id = $request->vendor_id;
        $product->product_type_id = $request->product_type_id;
        $product->product_group_id = $request->product_group_id;
        $product->brand_id = $request->brand_id;
        $product->small_description = $request->small_description;
        $product->detail_description = $request->detail_description;
        $product->vehicle_maker_id = $request->vehicle_maker_id;
        
        if ($request->applicable_vehicle_models == null) {
            $product->applicable_vehicle_models = '[]';
        } else {
            $strVehicleModels = implode(", ",$request->applicable_vehicle_models);
            $product->applicable_vehicle_models = '['.$strVehicleModels.']';
        }

        $product->start_year = $request->start_year;
        $product->end_year = $request->end_year;
        $product->chassis_code = $request->chassis_code;
        $product->chassis_type = $request->chassis_type;

        if($request->hasfile('cover_img'))
        {
            if ($request->file('cover_img')->isValid()) {
                $destinationPath = public_path('uploads/');
                $extension = $request->file('cover_img')->getClientOriginalExtension();
                $fileName = 'Product_'.date("Y-m-d_H-i-s").'_'.rand(11111, 99999) . '.' . $extension;
                $request->file('cover_img')->move($destinationPath, $fileName);
                $product->cover_img = $fileName;
            } else {
                flash()->error('File is not valid');

                return redirect()->back()->withInput();
            }
        }

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $image = 'Product_detail_'.date("Y-m-d_H-i-s").'_'.rand(11111, 99999).'.'.$file->extension();
                $file->move(public_path().'/uploads/', $image);  
                $images[] = $image;
            }
            $product->images = json_encode($images);
        }

        $product->updated_by = Auth::id();
        $product->save();
        flash()->success($product->name.' Product updated successfully');
        return redirect('product');
    }

    public function getSubCategory(Request $request)
    {   
        $subCategories = SubCategory::where('category_id', $request->category_id)->pluck('name', 'id');
        return response()->json($subCategories);
    }

    public function getVehicleModel(Request $request)
    {   
        $vehicleModels = VehicleModel::where('vehicle_maker_id', $request->vehicle_maker_id)->pluck('name', 'id');
        return response()->json($vehicleModels);
    }

    public function show($id)
    {
        $product = Product::with(['category', 'subCategory', 'brand', 'stockInProducts'])->find($id);

        $applicableModels = VehicleModel::whereIn('id', json_decode($product->applicable_vehicle_models))->get();

        $modelsArray = [];

        foreach($applicableModels as $model) {
            $modelsArray[] = $model->name;
        }
    
        $applicableModelList = implode(", ", $modelsArray);

        return view('product.show', compact('product', 'applicableModelList'));
    }

    public function editPublished($id)
    {
        $product = Product::find($id);

        return view('product.published_form', compact('product'));
    }

    public function updatePublished(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $rules = [
            'published' => 'required',
            'is_featured' => 'required',
        ];
        $messages = [
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $product->published = $request->published;
        $product->is_featured = $request->is_featured;
        $product->updated_by = Auth::id();
        $product->save();
        flash()->success($product->name.' Product status updated successfully');
        return redirect('product');
    }

    public function createStockIn($id)
    {
        $product = Product::find($id);

        return view('product.stock_in', compact('product'));
    }

    public function storeStockIn(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $rules = [
            'qty' => 'required|numeric',
            'remarks' => 'required',
        ];
        $messages = [
            'qty.required' => 'The Quantity field is required.',
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $totalQty = $product->quantity + $request->qty;

        $product->quantity = $totalQty;
        $product->stock_in_remarks = $request->remarks;
        $product->updated_by = Auth::id();
        $product->save();

        $stockInProduct = new StockInProduct;
        $stockInProduct->product_id = $product->id;
        $stockInProduct->quantity = $request->qty;
        $stockInProduct->remarks = $request->remarks;
        $stockInProduct->created_by = Auth::id();
        $stockInProduct->save();

        flash()->success($product->name.' Product stock in successfully');
        return redirect('product');
    }

    public function createStockOut($id)
    {
        $product = Product::find($id);

        return view('product.stock_out', compact('product'));
    }

    public function storeStockOut(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $rules = [
            'qty' => 'required|numeric',
            'remarks' => 'required',
        ];
        $messages = [
            'qty.required' => 'The Quantity field is required.',
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if ($request->qty > $product->quantity) {
            flash()->error('Not Enough Quantity is Available in Stock');
            return redirect()->back()
                        ->withInput();
        }
        $totalQty = $product->quantity - $request->qty;

        $product->quantity = $totalQty;
        $product->stock_out_remarks = $request->remarks;
        $product->updated_by = Auth::id();
        $product->save();

        $stockOutProduct = new StockOutProduct;
        $stockOutProduct->product_id = $product->id;
        $stockOutProduct->quantity = $request->qty;
        $stockOutProduct->remarks = $request->remarks;
        $stockOutProduct->created_by = Auth::id();
        $stockOutProduct->save();

        flash()->success($product->name.' Product stock in successfully');
        return redirect('product');
    }
}
