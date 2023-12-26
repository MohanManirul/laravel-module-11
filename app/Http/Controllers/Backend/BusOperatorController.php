<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusOperatorCrudRequest;
use App\Models\BusOperator;
use App\Services\BusOperatorCrudService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusOperatorController extends Controller 
{
    protected $folderPath;
    protected $BusOperatorCrudService;
    public function __construct(BusOperatorCrudService $BusOperatorCrudService)
    {
        $this->folderPath = 'backend.bus-operators.';
        $this->BusOperatorCrudService = $BusOperatorCrudService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {
             $all_bus_operators = BusOperator::select('id','name')->latest()->get();
            return view($this->folderPath.'index',compact('all_bus_operators'));
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
   public function store(BusOperatorCrudRequest $request){
    if ( auth('super_admin')->check() ) {
       try{
           $this->BusOperatorCrudService->storeBusOperator($request->name); 
           
           $redirectRoute = route('bus.operator.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Operator Created Successfully'],200);               
       
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
     $single_bus_operator = DB::table('bus_operators')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_bus_operator'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(Request $request,$id){
    if ( auth('super_admin')->check() ) {
    try {
        try{
            $this->BusOperatorCrudService->updateBusOperator($request->name , $id); 
            
            $redirectRoute = route('bus.operator.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Operator Updated Successfully'],200);               
        
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
        $destination = BusOperator::findOrFail(decrypt($id));
        if (!is_null($destination)) {           
            $destination->delete();
        }
        session()->flash('success' , 'BusOperator Deleted Successfull... ');
        return back();              
        }else {
            return view('errors.404');
        }
    }

}
