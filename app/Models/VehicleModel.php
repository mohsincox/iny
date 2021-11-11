<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicle_models';

    public function vehicleMaker()
    {
    	return $this->belongsTo(VehicleMaker::class, 'vehicle_maker_id');
    }
}
