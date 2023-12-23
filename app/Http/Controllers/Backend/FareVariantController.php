<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FareVariantCrudRequest;
use App\Models\Bus;
use App\Models\Destination;
use App\Models\FareVariant;
use App\Services\FareVariantCrudService;
use Exception;
use Illuminate\Http\Request;

class FareVariantController extends Controller
{
    protected $folderPath;
    protected $FareVariantCrudService;
    public function __construct(FareVariantCrudService $FareVariantCrudService)
    {
        $this->folderPath = 'backend.fare_variants.';
        $this->FareVariantCrudService = $FareVariantCrudService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {            
            $all_fare_variants = FareVariant::with('buses','start','end')->select('id', 'bus_id' , 'fare' ,'departure_point_id' ,'araival_point_id'  ,'departure_at' ,'araival_at' ,'travel_date')->latest()->get();
            return view($this->folderPath.'index',compact('all_fare_variants'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        $destinations = Destination::select('id','name')->orderByDesc('id')->get();
        $buses = Bus::select('id','name','bus_type')->orderByDesc('id')->get();
        return view($this->folderPath.'create',compact('buses','destinations'));
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(FareVariantCrudRequest $request){
    
    if ( auth('super_admin')->check() ) { 
       try{
           $this->FareVariantCrudService->storeFareVariant($request->bus_id , $request->fare ,$request->departure_point_id ,$request->araival_point_id  ,$request->departure_at ,$request->araival_at , $request->travel_date ); 
           
           $redirectRoute = route('fares.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'FareVariant Created Successfully'],200);               
       
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

       $single_fare_variant = FareVariant::with('start','end','buses')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_fare_variant','destinations','ends','all_buses'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(FareVariantCrudRequest $request,$id){

    if ( auth('super_admin')->check() ) { 
       try{
           $this->FareVariantCrudService->updatFareVariant($request->bus_id , $request->fare ,$request->departure_point_id ,$request->araival_point_id  ,$request->departure_at ,$request->araival_at , $request->travel_date , $id); 
           
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
        $destination = FareVariant::findOrFail(decrypt($id));
        if (!is_null($destination)) {           
            $destination->delete();
        }
        session()->flash('success' , 'FareVariant Deleted Successfull... ');
        return back();              
        }else {
            return view('errors.404');
        }
    }

}
