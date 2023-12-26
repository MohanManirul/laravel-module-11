<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Destination;
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
         return $all_available_buses = Bus::with('bus_operators','start','end')->where('starting_point_id' , $starting_point_id)->where('end_point_id',$end_point_id)->where('jurney_date',$jurney_date)->where('bus_type',$bus_type)->get();
        return view('frontend.available-buses', compact('all_available_buses'));
    }
}