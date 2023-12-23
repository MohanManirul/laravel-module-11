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
use Illuminate\Support\Facades\File;

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
            $all_buses = Bus::with('start','end')->select('id','name','image','starting_point_id','end_point_id','seats','bus_type','stopage','is_active')->latest()->get();
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
        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        $ends = Destination::select('id','name')->orderByDesc('id')->get();
        $single_bus = Bus::with('start','end')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_bus','destinations','ends'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(Request $request,$id){

    if ( auth('super_admin')->check() ) {
    try {
        $bus = Bus::findOrFail(decrypt($id));
        $bus->name = $request->name;
        $bus->starting_point_id = $request->starting_point_id;
        $bus->end_point_id      = $request->end_point_id;
        $bus->bus_type = $request->bus_type;
        $bus->bus_number = $request->bus_number;
        $bus->bus_registration_number = $request->bus_registration_number;
        $bus->service_charge = $request->service_charge;
        $bus->stopage = $request->stopage;
        $bus->is_active = $request->is_active;

        // image insert 
        if ($request->image) { 

            //delete that image
            if (File::exists('images/buses/' . $bus->image)) {
                File::delete('images/buses/' . $bus->image);
            }
            $image = $request->file('image');
            $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/buses/' . $img);
            Image::make($image)->save($location);
            $bus->image = $img;
        }
        if ($bus->save()) {
            $redirectRoute = route('buses.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Updated Successfully'],200);               
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