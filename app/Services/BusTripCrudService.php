<?php
namespace App\Services;

use App\Models\Trip;

class BusTripCrudService{
    public function storeBusTrip($journey_date, $bus_id){

        Trip::create([
            'journey_date' => $journey_date,
            'bus_id' => $bus_id,
          ]);
    }
    
    //update
    public function updateBusTrip( $journey_date,$bus_id , $id){              
     
       Trip::where('id', decrypt($id))
        ->update([
            'journey_date' => $journey_date,
            'bus_id' => $bus_id,
          ]);
      
    }

}


?>