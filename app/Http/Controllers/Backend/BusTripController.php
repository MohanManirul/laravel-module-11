<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusTripCrudRequest;
use App\Models\Bus;
use App\Models\Trip;
use App\Services\BusTripCrudService;
use Exception;
use Illuminate\Http\Request;

class BusTripController extends Controller
{
    protected $folderPath;
    protected $BusCrudService;
    public function __construct(BusTripCrudService $BusCrudService)
    {
        $this->folderPath = 'backend.trips.';
        $this->BusCrudService = $BusCrudService ;
    }
       
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {            
            $all_trips = Trip::with('buses')->select('id','journey_date','bus_id','is_active')->latest()->get();
            return view($this->folderPath.'index',compact('all_trips'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        $buses = Bus::select('id','name','bus_type')->orderByDesc('id')->get();
        return view($this->folderPath.'create',compact('buses'));
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(BusTripCrudRequest $request){

    if ( auth('super_admin')->check() ) { 
       try{
           $this->BusCrudService->storeBusTrip($request->journey_date, $request->bus_id); 
           
           $redirectRoute = route('bus.trip.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Trip Added Successfully'],200);               
       
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
         $buses = Bus::select('id','name','bus_type')->orderByDesc('id')->get();
         $single_trip = Trip::where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('buses','single_trip'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(BusTripCrudRequest $request, $id){

    if ( auth('super_admin')->check() ) { 
        try{
            $this->BusCrudService->updateBusTrip($request->seat_number, $id); 
            
            $redirectRoute = route('bus.seat.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Trip Updated Successfully'],200);               
        
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 200);
 
        }
     }else{
         return view('errors.404');
     }
}


}
