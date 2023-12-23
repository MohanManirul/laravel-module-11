<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['name','image', 'starting_point_id', 'end_point_id' , 'bus_type', 'bus_number','bus_registration_number', 'service_charge','cancellation_policy' ,'stopage'];
}
