<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusSeatCrudRequest;
use App\Models\Bus;
use App\Models\Seat;
use App\Services\BusSeatCrudService;
use Exception;
use Illuminate\Http\Request;

class BusSeatController extends Controller
{
    protected $folderPath;
    protected $BusCrudService;
    public function __construct(BusSeatCrudService $BusCrudService)
    {
        $this->folderPath = 'backend.seats.';
        $this->BusCrudService = $BusCrudService ;
    }

    // index
    public function index(){
        if ( auth('super_admin')->check() ) {            
            $all_seats = Seat::select('id','seat_number')->latest()->get();
            return view($this->folderPath.'index',compact('all_seats'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        // $buses = Bus::select('id','name')->orderByDesc('id')->get();
        return view($this->folderPath.'create');
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(BusSeatCrudRequest $request){
    
    if ( auth('super_admin')->check() ) { 
       try{
           $this->BusCrudService->storeBusSeat($request->seat_number); 
           
           $redirectRoute = route('bus.seat.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Seat Added Successfully'],200);               
       
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
        $single_seat = Seat::where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_seat'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(BusSeatCrudRequest $request, $id){

    if ( auth('super_admin')->check() ) { 
        try{
            $this->BusCrudService->updateBusSeat($request->seat_number, $id); 
            
            $redirectRoute = route('bus.seat.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Seat Updated Successfully'],200);               
        
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 200);
 
        }
     }else{
         return view('errors.404');
     }
}


}