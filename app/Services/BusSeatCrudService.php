<?php
namespace App\Services;

use App\Models\Seat;

class BusSeatCrudService{
    public function storeBusSeat($seat_number){

        Seat::create([
            'seat_number' => $seat_number,
          ]);
    }
    
    //update
    public function updateBusSeat( $seat_number, $id){              
     
       Seat::where('id', decrypt($id))
        ->update([
            'seat_number' => $seat_number,
          ]);
      
    }

}


?>