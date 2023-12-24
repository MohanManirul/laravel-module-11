<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusRouteCrudRequest;
use App\Models\BusRoute;
use App\Services\BusRouteCrudService;
use Exception;

class BusRouteController extends Controller
{
    protected $folderPath;
    protected $busRouteCrudService;
    public function __construct(BusRouteCrudService $busRouteCrudService)
    {
        $this->folderPath = 'backend.bus_routes.';
        $this->busRouteCrudService = $busRouteCrudService ;
    }

    // index
    public function index(){
        if ( auth('super_admin')->check() ) {            
            $all_routes = BusRoute::select('id','route_name')->latest()->get();
            return view($this->folderPath.'index',compact('all_routes'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        $bus_routes = BusRoute::select('id','route_name')->orderByDesc('id')->get();
        return view($this->folderPath.'create',compact('bus_routes'));
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(BusRouteCrudRequest $request){
    
    if ( auth('super_admin')->check() ) { 
       try{
           $this->busRouteCrudService->storeBusRoute($request->route_name); 
           
           $redirectRoute = route('bus.route.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Route Added Successfully'],200);               
       
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
        $single_bus_route = BusRoute::where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_bus_route'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(BusRouteCrudRequest $request, $id){

    if ( auth('super_admin')->check() ) { 
        try{
            $this->busRouteCrudService->updateBusRoute($request->route_name, $id); 
            
            $redirectRoute = route('bus.route.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Bus Route Updated Successfully'],200);               
        
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 200);
 
        }
     }else{
         return view('errors.404');
     }
}


}
