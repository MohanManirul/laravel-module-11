<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['journey_date','bus_id'];

    public function buses(){
        return $this->hasMany(Bus::class,'id','bus_id');
    }
}
