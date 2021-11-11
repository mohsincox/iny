<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGroup;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProductGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productGroups = ProductGroup::get();
        return view('product_group.index', compact('productGroups'));
    }

    public function create()
    {
        return view('product_group.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:product_groups'
        ];
        $messages = [
            'name.required' => 'The Product Group field is required.',
            'name.unique' => 'The Product Group already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $productGroup = new ProductGroup;
        $productGroup->name = $request->name;
        $productGroup->created_by = Auth::id();
        $productGroup->save();
        flash()->success($productGroup->name.' Product Group created successfully');
        return redirect('product-group');
    }

    public function edit($id)
    {
        $productGroup = ProductGroup::find($id);
        return view('product_group.edit', compact('productGroup'));
    }
    
    public function update(Request $request, $id)
    {
        $productGroup = ProductGroup::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:product_groups,name,'.$productGroup->id,
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'The Product Group field is required.',
            'name.unique' => 'The Product Group already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $productGroup->name = $request->name;
        $productGroup->status = $request->status;
        $productGroup->updated_by = Auth::id();
        $productGroup->save();
        flash()->success($productGroup->name.' Product Group updated successfully');
        return redirect('product-group');
    }
}
