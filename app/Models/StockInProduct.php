<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StockInProduct extends Model
{
    protected $table = 'stock_in_products';

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
