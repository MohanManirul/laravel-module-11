<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    use HasFactory;
    protected $fillable  = ['bus_id','seat_id','seat_number'];

    public function seat_numbers(){
        return $this->belongsTo(Seat::class,'seat_id','id');
    }
    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}
