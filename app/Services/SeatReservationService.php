<?php
namespace App\Services;

use App\Models\SeatReservation;

class SeatReservationService{
    public function storeSeatReservation($bus_id , $fare ,$departure_point_id ,$araival_point_id  ,$departure_at ,$araival_at,$travel_date){

        SeatReservation::create([
            'bus_id'                => $bus_id,
            'fare'                  => $fare,
            'departure_point_id'    => $departure_point_id,
            'araival_point_id'      => $araival_point_id,
            'departure_at'          => $departure_at,
            'araival_at'            => $araival_at,
            'travel_date'            => $travel_date,
          ]);
    }
    
    //update
    public function updatSeatReservation($bus_id , $fare ,$departure_point_id ,$araival_point_id  ,$departure_at ,$araival_at,$travel_date, $id){              
     
        SeatReservation::where('id', decrypt($id))
        ->update([
            'bus_id'                => $bus_id,
            'fare'                  => $fare,
            'departure_point_id'    => $departure_point_id,
            'araival_point_id'      => $araival_point_id,
            'departure_at'          => $departure_at,
            'araival_at'            => $araival_at,
            'travel_date'           => $travel_date,
          ]);
      
    }

    public function deleteProduct($id){
        Product::where('id', decrypt($id))->delete();
    }
}


?>