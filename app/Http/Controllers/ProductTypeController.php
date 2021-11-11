<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productTypes = ProductType::get();
        return view('product_type.index', compact('productTypes'));
    }

    public function create()
    {
        return view('product_type.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:product_types'
        ];
        $messages = [
            'name.required' => 'The Product Type field is required.',
            'name.unique' => 'The Product Type already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $productType = new ProductType;
        $productType->name = $request->name;
        $productType->created_by = Auth::id();
        $productType->save();
        flash()->success($productType->name.' Product Type created successfully');
        return redirect('product-type');
    }

    public function edit($id)
    {
        $productType = ProductType::find($id);
        return view('product_type.edit', compact('productType'));
    }
    
    public function update(Request $request, $id)
    {
        $productType = ProductType::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:product_types,name,'.$productType->id,
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'The Product Type field is required.',
            'name.unique' => 'The Product Type already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $productType->name = $request->name;
        $productType->status = $request->status;
        $productType->updated_by = Auth::id();
        $productType->save();
        flash()->success($productType->name.' Product Type updated successfully');
        return redirect('product-type');
    }
}
