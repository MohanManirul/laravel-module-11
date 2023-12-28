<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Destination;
use App\Models\SeatReservation;
use Exception;
use Illuminate\Http\Request;

class TicketQueryPageController extends Controller
{
    public function ticketQueryPage(){
        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        return view('frontend.ticket-query',compact('destinations'));
    }

    public function availableBus(Request $request){ 
       
         $starting_point_id = $request->starting_point_id;
         $end_point_id = $request->end_point_id;
         $jurney_date = $request->jurney_date;
         $bus_type = $request->bus_type;
        $all_available_buses = Bus::with('bus_seats','bus_seats.seat_numbers','bus_operators','start','end')->where('starting_point_id' , $starting_point_id)->where('end_point_id',$end_point_id)->where('jurney_date',$jurney_date)->where('bus_type',$bus_type)->get();
        return view('frontend.available-buses', compact('all_available_buses'));
    }

    public function attemptToGetSeat(Request $request){
        return $request->seat_id;
        try{
            $reservation = new SeatReservation();
            $reservation->bus_id = $request->bus_id;
            return $reservation->seat_id = $request->seat_id;
            $reservation->reserved_user_type = $request->reserved_user_type ?? ' ';
            $reservation->reserved_by_id = $request->reserved_by_id ?? ' ';
            $reservation->reserved_date = $request->reserved_date;
            $reservation->created_by = $request->created_by ?? ' ';
            $reservation->payment_status = $request->payment_status;
            $reservation->is_booked = $request->is_booked;
            $reservation->is_sold = $request->is_sold;
            $reservation->seat_status = $request->seat_status;
            $reservation->save(); 
            $back = back();
            return response()->json(['redirect' => $back , 'redirectMessage' => 'Seat Reserved Successfully , pay for complteion'],200);               
        }catch(Exception $e){

        }
        return "attempt To Get Seat";
    }
    public function attemptToGetSeatAgain(){
        return "attemptToGetSeatAgain";
    }
}