<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model
{
    use HasFactory;
    protected $fillable =['bus_id','seat_id','reserved_user_type','reserved_by_id','reserved_date','payment_status','is_booked','is_sold','seat_status'];
}
