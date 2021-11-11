<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;

class ProductsController extends Controller
{
    public function export() 
    {
    	// return Product::with('brand')->get();
        return Excel::download(new ProductsExport, 'productsZ.xlsx');
    }
}
