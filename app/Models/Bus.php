<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['jurney_date','bus_operators_id','bus_route_id','image', 'starting_point_id', 'end_point_id' , 'bus_type', 'bus_number','bus_registration_number', 'service_charge','cancellation_policy' ,'stopage'];
    public function start()
    {
        return $this->hasMany(Destination::class, 'id', 'starting_point_id');
    }
    public function end()
    {
        return $this->hasMany(Destination::class, 'id', 'end_point_id');
    }
    public function bus_seats()
    {
        return $this->hasMany(BusSeat::class);
    }

    public function bus_routes(){
        return $this->belongsTo(BusRoute::class);
    }
    public function bus_operators(){
        return $this->belongsTo(BusOperator::class);
    }
   
 

}
