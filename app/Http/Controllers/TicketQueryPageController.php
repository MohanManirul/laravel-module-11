<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Destination;
use App\Models\SeatReservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class TicketQueryPageController extends Controller
{
    public function ticketQueryPage(){
         $session_id = Session::getId();         
         if($session_id){            
            SeatReservation::insert([
                'session_id'              => $session_id,
            ]);
        }
        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        return view('frontend.ticket-query',compact('destinations'));
    }

    public function availableBus(Request $request){ 
        $session_id = Session::getId();
        // return $mySelection = SeatReservation::groupBy('session_id')->where('session_id', 'TYZnBqmM1TfzBop8HUFov5IZ9rtcVUwZcbKU8uL1')->count('session_id');
        $mySeats = SeatReservation::with('seat_numbers')->select('seat_id')->where('session_id', $session_id)->get();
        $myTotalSeat = SeatReservation::where('session_id', $session_id)->count('seat_id');
         $myTotalSeatFare = SeatReservation::where('session_id', $session_id)->sum('fare');
         $starting_point_id = $request->starting_point_id;
         $end_point_id = $request->end_point_id;
         $jurney_date = $request->jurney_date;
         $bus_type = $request->bus_type;
         
        $all_available_buses = Bus::with('bus_seats','bus_seats.seat_numbers','bus_operators','start','end')->where('starting_point_id' , $starting_point_id)->where('end_point_id',$end_point_id)->where('jurney_date',$jurney_date)->where('bus_type',$bus_type)->get();
        return view('frontend.available-buses', compact('all_available_buses', 'mySeats'));
    }


    

    public function attemptToGetSeat(Request $request){       
        $session_id = Session::getId();
        // $storedSessionId = SeatReservation::select('session_id')->where('session_id', $session_id)->first();
         $mySelection = SeatReservation::groupBy('session_id')->where('session_id', $session_id)->get();
        $today = date("Y-m-d");
        try{
            $reservation = new SeatReservation();
            $reservation->bus_id = $request->bus_id;
            $reservation->seat_id = $request->seat_id;
            $reservation->fare = $request->fare;
            $reservation->reserved_user_type = $request->reserved_user_type;
            $reservation->reserved_by_id = $request->reserved_by_id;
            $reservation->reserved_date = $today; 
            $reservation->payment_status = $request->payment_status ?? 'unpaid'; 
            $reservation->is_booked = $request->is_booked ?? 'blocked';
            $reservation->is_sold = $request->is_sold ?? '0';
            $reservation->seat_status = $request->seat_status ?? 'available';
            $reservation->session_id = $session_id;
            if ($reservation->save()) {
                return response()->json(['success' => $request->seat_number.' Seat Selected . Pay For Final Ticket'], 200);
            }             
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 200);
        }
    }
    public function attemptToGetSeatAgain(){
        return "attemptToGetSeatAgain";
    }
}