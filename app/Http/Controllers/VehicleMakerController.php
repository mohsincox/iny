<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleMaker;
use Validator;
use Illuminate\Support\Facades\Auth;

class VehicleMakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vehicleMakers = VehicleMaker::get();
        return view('vehicle_maker.index', compact('vehicleMakers'));
    }

    public function create()
    {
        return view('vehicle_maker.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:vehicle_makers'
        ];
        $messages = [
            'name.required' => 'The Vehicle Maker field is required.',
            'name.unique' => 'The Vehicle Maker already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $vehicleMaker = new VehicleMaker;
        $vehicleMaker->name = $request->name;
        $vehicleMaker->created_by = Auth::id();
        $vehicleMaker->save();
        flash()->success($vehicleMaker->name.' Vehicle Maker created successfully');
        return redirect('vehicle-maker');
    }

    public function edit($id)
    {
        $vehicleMaker = VehicleMaker::find($id);
        return view('vehicle_maker.edit', compact('vehicleMaker'));
    }
    
    public function update(Request $request, $id)
    {
        $vehicleMaker = VehicleMaker::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required|unique:vehicle_makers,name,'.$vehicleMaker->id,
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'The Vehicle Maker field is required.',
            'name.unique' => 'The Vehicle Maker already exist.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $vehicleMaker->name = $request->name;
        $vehicleMaker->status = $request->status;
        $vehicleMaker->updated_by = Auth::id();
        $vehicleMaker->save();
        flash()->success($vehicleMaker->name.' Vehicle Maker updated successfully');
        return redirect('vehicle-maker');
    }
}
