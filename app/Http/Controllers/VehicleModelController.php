<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Models\VehicleMaker;
use Validator;
use Illuminate\Support\Facades\Auth;

class VehicleModelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vehicleModels = VehicleModel::with('vehicleMaker')->get();
        return view('vehicle_model.index', compact('vehicleModels'));
    }

    public function create()
    {
        $vehicleMakerList = VehicleMaker::pluck('name', 'id');
        return view('vehicle_model.create', compact('vehicleMakerList'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'vehicle_maker_id' => 'required',
        ];
        $messages = [
            'name.required' => 'The Vehicle Model field is required.',
            'vehicle_maker_id.required' => 'The Vehicle Maker field is required.'
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $vehicleModelExist = VehicleModel::with('vehicleMaker')->where('name', $request->name)->where('vehicle_maker_id', $request->vehicle_maker_id)->first();
        if($vehicleModelExist) {
            flash()->error($vehicleModelExist->name.' Vehicle Model already exist in '.$vehicleModelExist->vehicleMaker->name.' Vehicle Maker.');
            return redirect()->back()->withInput();
        }

        $vehicleModel = new VehicleModel;
        $vehicleModel->name = $request->name;
        $vehicleModel->vehicle_maker_id = $request->vehicle_maker_id;
        $vehicleModel->created_by = Auth::id();
        $vehicleModel->save();
        flash()->success($vehicleModel->name.' Vehicle Model created successfully');
        return redirect('vehicle-model');
    }

    public function edit($id)
    {
        $vehicleModel = VehicleModel::find($id);
        $vehicleMakerList = VehicleMaker::pluck('name', 'id');
        return view('vehicle_model.edit', compact('vehicleModel', 'vehicleMakerList'));
    }
    
    public function update(Request $request, $id)
    {
        $vehicleModel = VehicleModel::find($id);
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'vehicle_maker_id' => 'required',
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'The Vehicle Model field is required.',
            'vehicle_maker_id.required' => 'The Vehicle Maker field is required.',
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something went wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $vehicleModelExist = VehicleModel::with('vehicleMaker')->where('name', $request->name)->where('vehicle_maker_id', $request->vehicle_maker_id)->where('id', '<>', $vehicleModel->id)->first();
        if($vehicleModelExist) {
            flash()->error($vehicleModelExist->name.' Vehicle Model already exist in '.$vehicleModelExist->vehicleMaker->name.' Vehicle Maker.');
            return redirect()->back()->withInput();
        }

        $vehicleModel->name = $request->name;
        $vehicleModel->vehicle_maker_id = $request->vehicle_maker_id;
        $vehicleModel->status = $request->status;
        $vehicleModel->updated_by = Auth::id();
        $vehicleModel->save();
        flash()->success($vehicleModel->name.' Vehicle Model updated successfully');
        return redirect('vehicle-model');
    }
}
