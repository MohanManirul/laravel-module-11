<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusCrudRequet;
use App\Models\Bus;
use App\Models\Destination;
use App\Services\BusCrudService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BusController extends Controller
{
    protected $folderPath;
    protected $BusCrudService;
    public function __construct(BusCrudService $BusCrudService)
    {
        $this->folderPath = 'backend.buses.';
        $this->BusCrudService = $BusCrudService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {
             $all_buses = Bus::select('id','name')->latest()->get();
            return view($this->folderPath.'index',compact('all_buses'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        return view($this->folderPath.'create',compact('destinations'));
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(BusCrudRequet $request){
    
    if ( auth('super_admin')->check() ) { 
       try{
           $this->BusCrudService->storeBus($request->name , $request->image ,$request->starting_point_id ,$request->end_point_id  ,$request->bus_type ,$request->bus_number ,$request->bus_registration_number , $request->service_charge ,  $request->cancellation_policy ,  $request->stopage); 
           
           $redirectRoute = route('buses.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Created Successfully'],200);               
       
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
     $single_destination = DB::table('buses')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_destination'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(Request $request,$id){
    if ( auth('super_admin')->check() ) {
    try {
        try{
            $this->BusCrudService->updateBus($request->name , $id); 
            
            $redirectRoute = route('buses.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Updated Successfully'],200);               
        
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 200);
 
            }
        } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 200);
    }
    }else{
        return view('errors.404');
        }
}

public function delete($id){
    if (auth('super_admin')->check()) {
        $destination = Bus::findOrFail(decrypt($id));
        if (!is_null($destination)) {           
            $destination->delete();
        }
        session()->flash('success' , 'Bus Deleted Successfull... ');
        return back();              
        }else {
            return view('errors.404');
        }
    }

}