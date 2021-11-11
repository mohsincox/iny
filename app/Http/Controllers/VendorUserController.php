<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Vendor;
use Validator;
use Illuminate\Support\Facades\Auth;

class VendorUserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        $vendorUsers = User::with(['vendor'])->whereNotNull('vendor_id')->get();
        // $vendorUsers = User::with(['vendor'])->whereNull('email')->get();

        return view('vendor_user.index', compact('vendorUsers'));
    }

    public function create()
    {
        $vendorList = Vendor::pluck('name', 'id');

    	return view('vendor_user.create', compact('vendorList'));
    }

    public function store(Request $request)
    {
    	$input = $request->all();
	    $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:inv_users',
            'password' => 'required|min:8',
            'vendor_id' => 'required|numeric',
	    ];
	    $messages = [
            'email.required' => 'The Username field is required.',
            'email.unique' => 'The Username already exist.',
            'name.required' => 'The Name field is required.',
            'vendor_id.required' => 'The Vendor Name field is required.',
        ];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $regUser = new User;
        $regUser->email = $request->email;
        $regUser->password = bcrypt($request->password);
        $regUser->secret = base64_encode($request->password);
        $regUser->name = $request->name;
        $regUser->vendor_id = $request->vendor_id;
        $regUser->role = 'vendor';
        $regUser->created_by = Auth::id();
        $regUser->save();
        flash()->success($regUser->name.' Vendor user created successfully');
    	return redirect('vendor-user');
    }
}
