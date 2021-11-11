<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Validator;
use Illuminate\Support\Facades\Auth;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brands = Brand::get();
        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:brands',
            'image' => 'mimes:jpeg,jpg,png,gif|max:5000'
        ];
        $messages = [
            'name.required' => 'The Brand field is required.',
            'name.unique' => 'The Brand already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $brand = new Brand;

        if ($request->image == null) {
            $brand->name = $request->name;
            $brand->created_by = Auth::id();
            $brand->save();
            flash()->success($brand->name.' Brand created successfully');
            return redirect('brand');
        }
        else {
            if ($request->file('image')->isValid()) {
                $destinationPath = public_path('uploads/');
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = $brand->getTable().'_'.date("Y-m-d_H-i-s").'_'.rand(11111, 99999) . '.' . $extension;
                $request->file('image')->move($destinationPath, $fileName);
            } else {
                flash()->error('File is not valid');

                return redirect()->back()->withInput();
            }
            
            $brand->name = $request->name;
            $brand->created_by = Auth::id();
            $brand->image = $fileName;
            $brand->save();
            flash()->success($brand->name.' Brand created successfully');
            return redirect('brand');
        }
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }
    
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:brands,name,'.$brand->id,
            'status' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:5000'
        ];
        $messages = [
            'name.required' => 'The Brand field is required.',
            'name.unique' => 'The Brand already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->image == null) {
            $brand->name = $request->name;
            $brand->status = $request->status;
            $brand->updated_by = Auth::id();
            $brand->save();
            flash()->success($brand->name.' Brand updated successfully');
            return redirect('brand');
        }
        else {
            if ($request->file('image')->isValid()) {
                $destinationPath = public_path('uploads/');
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = $brand->getTable().'_'.date("Y-m-d_H-i-s").'_'.rand(11111, 99999) . '.' . $extension;
                $request->file('image')->move($destinationPath, $fileName);
            } else {
                flash()->error('uploaded file is not valid');

                return redirect()->back()->withInput();
            }
            
            File::delete(public_path('uploads/') . $brand->image);
            $brand->name = $request->name;
            $brand->status = $request->status;
            $brand->updated_by = Auth::id();
            $brand->image = $fileName;
            $brand->save();
            flash()->success($brand->name.' Brand updated successfully');
            return redirect('brand');
        }
    }
}
