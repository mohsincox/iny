<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\VehicleMaker;
use App\Models\VehicleModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $subCategoryCount = SubCategory::count();
        $brandCount = Brand::count();
        $vendorCount = Vendor::count();
        $vendorUserCount = User::whereNotNull('vendor_id')->count();
        $vehicleMakerCount = VehicleMaker::count();
        $vehicleModelCount = VehicleModel::count();

        return view('home', compact('productCount', 'categoryCount', 'subCategoryCount', 'brandCount', 'vendorCount', 'vendorUserCount', 'vehicleMakerCount', 'vehicleModelCount'));
    }
}
