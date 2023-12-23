<?php
namespace App\Services;

use App\Models\FareVariant;
use App\Models\Product;

class FareVariantCrudService{
    public function storeFareVariant($bus_id , $fare ,$departure_point_id ,$araival_point_id  ,$departure_at ,$araival_at,$travel_date){

        FareVariant::create([
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
    public function updatFareVariant($bus_id , $fare ,$departure_point_id ,$araival_point_id  ,$departure_at ,$araival_at,$travel_date, $id){              
     
        FareVariant::where('id', decrypt($id))
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