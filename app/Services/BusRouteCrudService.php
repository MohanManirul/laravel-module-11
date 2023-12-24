<?php
namespace App\Services;

use App\Models\BusRoute;

class BusRouteCrudService{
    public function storeBusRoute($route_name){

        BusRoute::create([
            'route_name' => $route_name,
          ]);
    }
    
    //update
    public function updateBusRoute( $route_name, $id){              
     
       BusRoute::where('id', decrypt($id))
        ->update([
            'route_name' => $route_name,
          ]);
      
    }

}


?>