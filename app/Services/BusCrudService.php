<?php
namespace App\Services;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Bus;
use App\Models\BusSeat;
use Illuminate\Support\Facades\File;

class BusCrudService{
    public function storeBus( $bus_data ){
       
        
        $img = time() . Str::random(12) . '.' . $bus_data['bus_data']['image']->getClientOriginalExtension();
        $location = public_path('images/buses/' . $img);
        Image::make($bus_data['bus_data']['image'])->save($location);


    $bus = Bus::create([
            'jurney_date'               => $bus_data['bus_data']['jurney_date'],
            'bus_operators_id'          => $bus_data['bus_data']['bus_operators_id'],
            'bus_route_id'              => $bus_data['bus_data']['bus_route_id'],
            'image'                     => $img,
            'starting_point_id'         => $bus_data['bus_data']['starting_point_id'],
            'end_point_id'              => $bus_data['bus_data']['end_point_id'],       
            'bus_type'                  => $bus_data['bus_data']['bus_type'],
            'bus_number'                => $bus_data['bus_data']['bus_number'],
            'bus_registration_number'   => $bus_data['bus_data']['bus_registration_number'],
            'service_charge'            => $bus_data['bus_data']['service_charge'],
            'cancellation_policy'       => strip_tags($bus_data['bus_data']['cancellation_policy']),
            'stopage'                   => $bus_data['bus_data']['stopage'],
            
        ]);

        foreach($bus_data['seat_data'] as $single_seat_number){
            BusSeat::create([
                'bus_id' => $bus->id,
                'seat_id' => $single_seat_number,
                // 'seat_number' => $seat_number,
            ]);
   
    }
        

    }

    //update
    public function updateBus($bus_data , $id){             
        $img = $bus_data['bus_data']['old_image'] ;
        // image insert 
        if ($bus_data['bus_data']['image']) { 

            //delete that image
            if (File::exists('images/buses/' . $bus_data['bus_data']['old_image'])) {
                File::delete('images/buses/' . $bus_data['bus_data']['old_image']);
            }
            $img = time() . Str::random(12) . '.' . $bus_data['bus_data']['image']->getClientOriginalExtension();
            $location = public_path('images/buses/' . $img);
            Image::make($bus_data['bus_data']['image'])->save($location);
        }

        $bus = Bus::where('id', $id)
        ->update([
            'jurney_date'               => $bus_data['bus_data']['jurney_date'],
            'bus_operators_id'          => $bus_data['bus_data']['bus_operators_id'],
            'bus_route_id'              => $bus_data['bus_data']['bus_route_id'],
            'image'                     => $img,
            'starting_point_id'         => $bus_data['bus_data']['starting_point_id'],
            'end_point_id'              => $bus_data['bus_data']['end_point_id'],       
            'bus_type'                  => $bus_data['bus_data']['bus_type'],
            'bus_number'                => $bus_data['bus_data']['bus_number'],
            'bus_registration_number'   => $bus_data['bus_data']['bus_registration_number'],
            'service_charge'            => $bus_data['bus_data']['service_charge'],
            'cancellation_policy'       => strip_tags($bus_data['bus_data']['cancellation_policy']),
            'stopage'                   => $bus_data['bus_data']['stopage'],
            'is_active'                   => $bus_data['bus_data']['is_active'],
          ]);

          foreach($bus_data['seat_data'] as $single_seat_number){
            BusSeat::create([
                'bus_id' => $bus->id,
                'seat_id' => $single_seat_number,
            ]);
      
        }
    }
}


?>