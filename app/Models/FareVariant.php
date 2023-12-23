<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FareVariant extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id','fare','departure_point_id','araival_point_id','departure_at','araival_at'];

    public function buses()
    {
        return $this->hasMany(Bus::class,'id','bus_id');
    }

    public function start()
    {
        return $this->hasMany(Destination::class, 'id', 'departure_point_id');
    }
    public function end()
    {
        return $this->hasMany(Destination::class, 'id', 'araival_point_id');
    }
}
