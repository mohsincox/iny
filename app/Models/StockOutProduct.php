<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StockOutProduct extends Model
{
    protected $table = 'stock_out_products';

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
