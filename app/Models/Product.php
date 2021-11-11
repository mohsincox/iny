<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function vendor()
    {
    	return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class, 'product_group_id');
    }

    public function vehicleMaker()
    {
        return $this->belongsTo(VehicleMaker::class, 'vehicle_maker_id');
    }

    public function stockInProducts()
    {
        return $this->hasMany('App\Models\StockInProduct', 'product_id');
    }

    public function stockOutProducts()
    {
        return $this->hasMany('App\Models\StockOutProduct', 'product_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
