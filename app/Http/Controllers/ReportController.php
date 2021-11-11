<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ReportController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }
    
    public function productForm()
    {
        return view('report.product.form');
    }

    public function productShow(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $startDateTime = $request->start_date . ' 00:00:00';
        $endDateTime = $request->end_date . ' 23:59:59';
  
        $products = Product::with(['category', 'subCategory', 'brand'])->whereBetween('created_at', [$startDateTime, $endDateTime])->orderBy('id', 'desc')->get();

        return view('report.product.show', compact('products', 'startDate', 'endDate'));
    }

    public function categoryForm()
    {
    	$categoryList = Category::pluck('name', 'id');

        return view('report.category.form', compact('categoryList'));
    }

    public function categoryShow(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $categoryId = $request->category_id;

        $startDateTime = $request->start_date . ' 00:00:00';
        $endDateTime = $request->end_date . ' 23:59:59';
  
        $products = Product::with(['category', 'subCategory', 'brand'])->where('category_id', $categoryId)->whereBetween('created_at', [$startDateTime, $endDateTime])->orderBy('id', 'desc')->get();

        return view('report.category.show', compact('products', 'startDate', 'endDate'));
    }

    public function brandForm()
    {
    	$brandList = Brand::pluck('name', 'id');

        return view('report.brand.form', compact('brandList'));
    }

    public function brandShow(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $brandId = $request->brand_id;

        $startDateTime = $request->start_date . ' 00:00:00';
        $endDateTime = $request->end_date . ' 23:59:59';
  
        $products = Product::with(['category', 'subCategory', 'brand'])->where('brand_id', $brandId)->whereBetween('created_at', [$startDateTime, $endDateTime])->orderBy('id', 'desc')->get();

        return view('report.brand.show', compact('products', 'startDate', 'endDate'));
    }
}
