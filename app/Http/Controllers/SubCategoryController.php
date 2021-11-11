<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Validator;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        // $subCategories = SubCategory::with('category')->orderBy('id', 'desc')->get();
        return view('sub_category.index', compact('subCategories'));
    }

    public function create()
    {
    	$categoryList = Category::pluck('name', 'id');
        return view('sub_category.create', compact('categoryList'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'category_id' => 'required'
        ];
        $messages = [
            'name.required' => 'The Sub Category field is required.',
            'category_id.required' => 'The Category field is required.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $subCatExist = SubCategory::with('category')->where('name', $request->name)->where('category_id', $request->category_id)->first();
        if($subCatExist) {
        	flash()->error('Sub Category '.$subCatExist->name.' in '.$subCatExist->category->name.' Category already exists.');
    		return redirect()->back()->withInput();
        }

        $subCategory = new SubCategory;
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->created_by = Auth::id();
        $subCategory->save();
        flash()->success($subCategory->name.' Sub Category created successfully');
        return redirect('sub-category');
    }

    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categoryList = Category::pluck('name', 'id');
        return view('sub_category.edit', compact('subCategory', 'categoryList'));
    }
    
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'The Sub Category field is required.',
            'category_id.required' => 'The Category field is required.',
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $subCatExist = SubCategory::with('category')->where('name', $request->name)->where('category_id', $request->category_id)->where('id', '<>', $subCategory->id)->first();
        if($subCatExist) {
        	flash()->error('Sub Category '.$subCatExist->name.' in '.$subCatExist->category->name.' Category already exists.');
    		return redirect()->back()->withInput();
        }

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;
        $subCategory->updated_by = Auth::id();
        $subCategory->save();
        flash()->success($subCategory->name.' Sub Category updated successfully');
        return redirect('sub-category');
    }
}
