<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationCrudRequet;
use App\Models\Destination;
use App\Services\DestinationCrudService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationController extends Controller
{
    protected $folderPath;
    protected $DestinationCrudService;
    public function __construct(DestinationCrudService $DestinationCrudService)
    {
        $this->folderPath = 'backend.destinations.';
        $this->DestinationCrudService = $DestinationCrudService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {
             $all_destinations = Destination::select('id','name')->latest()->get();
            return view($this->folderPath.'index',compact('all_destinations'));
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
   public function store(DestinationCrudRequet $request){
    if ( auth('super_admin')->check() ) {
       try{
           $this->DestinationCrudService->storeDestination($request->name); 
           
           $redirectRoute = route('destinations.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Destination Created Successfully'],200);               
       
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
     $single_destination = DB::table('destinations')->where('id' , decrypt($id))->first();
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
            $this->DestinationCrudService->updateDestination($request->name , $id); 
            
            $redirectRoute = route('destinations.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Destination Updated Successfully'],200);               
        
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
        $destination = Destination::findOrFail(decrypt($id));
        if (!is_null($destination)) {           
            $destination->delete();
        }
        session()->flash('success' , 'Destination Deleted Successfull... ');
        return back();              
        }else {
            return view('errors.404');
        }
    }

}
