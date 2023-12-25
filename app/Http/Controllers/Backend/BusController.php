<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusCrudRequet;
use App\Models\Bus;
use App\Models\BusSeat;
use App\Models\Destination;
use App\Models\Seat;
use App\Services\BusCrudService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $all_buses = Bus::with('start','end')->select('id','jurney_date','name','image','starting_point_id','end_point_id','seats','bus_type','stopage','is_active')->latest()->get();     
            return view($this->folderPath.'index',compact('all_buses'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        $all_seats = Seat::select('id','seat_number')->get();
        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        return view($this->folderPath.'create',compact('destinations','all_seats'));
    }else{
        return view('errors.404');
    }
    
   }

   //store

//    public function store(Request $request){

//     if ( auth('super_admin')->check() ) {
//     try {
//         $bus = new Bus();
//         $bus->jurney_date = $request->jurney_date;
//         $bus->name = $request->name;
//         $bus->starting_point_id = $request->starting_point_id;
//         $bus->end_point_id      = $request->end_point_id;
//         $bus->bus_type = $request->bus_type;
//         $bus->bus_number = $request->bus_number;
//         $bus->bus_registration_number = $request->bus_registration_number;
//         $bus->service_charge = $request->service_charge;
//         $bus->stopage = $request->stopage;

//         // image insert 
//         if ($request->image) { 

//             //delete that image
//             if (File::exists('images/buses/' . $bus->image)) {
//                 File::delete('images/buses/' . $bus->image);
//             }
//             $image = $request->file('image');
//             $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
//             $location = public_path('images/buses/' . $img);
//             Image::make($image)->save($location);
//             $bus->image = $img;
//         }
//     //   return  $request->seat_number ;
//         if ($bus->save()) {
//             if($request['seat_number']){
               
//                 foreach ($request['seat_number'] as $key => $single_seat_number) {  
//                     // return $request['seat_number'];
//                     $bus_seat = new BusSeat();               
//                     $bus_seat->bus_id = $bus->id;
//                     $bus_seat->seat_id = $single_seat_number ;               
//                     $bus_seat->save();  
    
//                 }
//             }
                         
//         }
//         $redirectRoute = route('buses.all');
//         return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Seat Added Successfully'],200);  
//     } catch (Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 200);
//     }
//     }else{
//         return view('errors.404');
//         }
// }


  //store
   public function store(BusCrudRequet $request){
   
    if ( auth('super_admin')->check() ) { 
        DB::beginTransaction();
       try{


        $bus_data = [
            'jurney_date' => $request->jurney_date,
            'name' => $request->name,
            'image' => $request->image,
            'starting_point_id' => $request->starting_point_id,
            'end_point_id' => $request->end_point_id,
            'bus_type' => $request->bus_type,
            'bus_number' => $request->bus_number,
            'bus_registration_number' => $request->bus_registration_number,
            'service_charge' => $request->service_charge,
            'cancellation_policy' => $request->cancellation_policy,
            'stopage' => $request->stopage
        ];

            $seat_data = $request->seat_number;

            $bus_data = ['bus_data' => $bus_data, 'seat_data' => $seat_data];
           
            $this->BusCrudService->storeBus($bus_data); 
           DB::commit();
           $redirectRoute = route('buses.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Created Successfully'],200);               
       
       }catch(Exception $e){
            DB::rollBack();
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
         $single_bus = Bus::with('start','end','bus_seats','bus_seats.seat_numbers')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_bus','destinations','ends'));
  }else{
    return view('errors.404');
    }
 }

 
//update
public function update(BusCrudRequet $request,$id){

    if ( auth('super_admin')->check() ) { 
        DB::beginTransaction();
       try{

        $bus = Bus::findOrFail(decrypt($id));

        $bus_data = [
            'jurney_date' => $request->jurney_date,
            'name' => $request->name,
            'image' => $request->image,
            'starting_point_id' => $request->starting_point_id,
            'end_point_id' => $request->end_point_id,
            'bus_type' => $request->bus_type,
            'bus_number' => $request->bus_number,
            'bus_registration_number' => $request->bus_registration_number,
            'service_charge' => $request->service_charge,
            'cancellation_policy' => $request->cancellation_policy,
            'stopage' => $request->stopage,
            'old_image' => $bus->image,
            'is_active' => $bus->is_active
        ];

            // $seat_data = $request->seat_number;

            $bus_data = ['bus_data' => $bus_data];
           
            $this->BusCrudService->updateBus($bus_data , $bus->id); 
           DB::commit();
           $redirectRoute = route('buses.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Created Successfully'],200);               
       
       }catch(Exception $e){
            DB::rollBack();
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