<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeatReservation;
use App\Services\SeatReservationService;
use Illuminate\Http\Request;

class SeatReservationController extends Controller
{
    protected $folderPath;
    protected $ReservationService;
    public function __construct(SeatReservationService $ReservationService)
    {
        $this->folderPath = 'backend.seat_reservations.';
        $this->ReservationService = $ReservationService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {            
            $all_seat_reservations = SeatReservation::with('buses','start','end')->select('id', 'bus_id' , 'fare' ,'departure_point_id' ,'araival_point_id'  ,'departure_at' ,'araival_at' ,'travel_date')->latest()->get();
            return view($this->folderPath.'index',compact('all_seat_reservations'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        return view($this->folderPath.'create');
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(ReservationRequest $request){
    
    if ( auth('super_admin')->check() ) { 
       try{
           $this->ReservationService->storeSeatReservation($request->bus_id , $request->fare ,$request->departure_point_id ,$request->araival_point_id  ,$request->departure_at ,$request->araival_at , $request->travel_date ); 
           
           $redirectRoute = route('fares.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'SeatReservation Created Successfully'],200);               
       
       }catch(Exception $e){
           return response()->json(['error' => $e->getMessage()], 200);

       }
    }else{
        return view('errors.404');
    }

  }

  //edit
  public function edit($id)
  {  
    if ( auth('super_admin')->check() ) {

        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        $ends = Destination::select('id','name')->orderByDesc('id')->get();
        $all_buses = Bus::select('id','name','bus_type')->orderByDesc('id')->get();

       $single_fare_variant = SeatReservation::with('start','end','buses')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_fare_variant','destinations','ends','all_buses'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(ReservationRequest $request,$id){

    if ( auth('super_admin')->check() ) { 
       try{
           $this->ReservationService->updatSeatReservation($request->bus_id , $request->fare ,$request->departure_point_id ,$request->araival_point_id  ,$request->departure_at ,$request->araival_at , $request->travel_date , $id); 
           
           $redirectRoute = route('fares.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Fare Variant Updated Successfully'],200);               
       
       }catch(Exception $e){
           return response()->json(['error' => $e->getMessage()], 200);

       }
    }else{
        return view('errors.404');
    }
}

public function delete($id){
    if (auth('super_admin')->check()) {
        $destination = SeatReservation::findOrFail(decrypt($id));
        if (!is_null($destination)) {           
            $destination->delete();
        }
        session()->flash('success' , 'SeatReservation Deleted Successfull... ');
        return back();              
        }else {
            return view('errors.404');
        }
    }

}
