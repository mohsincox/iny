<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Validator;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vendors = Vendor::get();
        return view('vendor.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:vendors',
            'mobile_number' => 'required'
        ];
        $messages = [
            'name.required' => 'The Vendor field is required.',
            'name.unique' => 'The Vendor already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->mobile_number = $request->mobile_number;
        $vendor->address = $request->address;
        $vendor->created_by = Auth::id();
        $vendor->save();
        flash()->success($vendor->name.' Vendor created successfully');
        return redirect('vendor');
    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.edit', compact('vendor'));
    }
    
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:vendors,name,'.$vendor->id,
            'status' => 'required',
            'mobile_number' => 'required'
        ];
        $messages = [
            'name.required' => 'The Vendor field is required.',
            'name.unique' => 'The Vendor already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $vendor->name = $request->name;
        $vendor->mobile_number = $request->mobile_number;
        $vendor->address = $request->address;
        $vendor->status = $request->status;
        $vendor->updated_by = Auth::id();
        $vendor->save();
        flash()->success($vendor->name.' Vendor updated successfully');
        return redirect('vendor');
    }
}
