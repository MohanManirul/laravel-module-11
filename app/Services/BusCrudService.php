<?php
namespace App\Services;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Bus;

class BusCrudService{
    public function storeBus($name, $image , $starting_point_id , $end_point_id , $bus_type, $bus_number , $bus_registration_number , $service_charge , $cancellation_policy , $stopage){
       
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/buses/' . $img);
        Image::make($image)->save($location);


       return Bus::create([
            'name'                      => $name,
            'image'                     => $img,
            'starting_point_id'         => $starting_point_id,
            'end_point_id'              => $end_point_id,       
            'bus_type'                  => $bus_type,
            'bus_number'                => $bus_number,
            'bus_registration_number'   => $bus_registration_number,
            'service_charge'            => $service_charge,
            'cancellation_policy'       => strip_tags($cancellation_policy),
            'stopage'                   => $stopage
          ]);
    }

    //update
    public function updateBus($name , $id){              
     
       $product =  Bus::where('id', decrypt($id))
        ->update([
            'name'       => $name
          ]);
      
    }

    public function deleteBus($id){
        Bus::where('id', decrypt($id))->delete();
    }
}


?>