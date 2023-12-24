<?php
namespace App\Services;

use App\Models\Destination;

class DestinationCrudService{
    public function storeDestination($name){
        Destination::create([
            'name' => $name
          ]);
    }
    
    //update
    public function updateDestination($name , $id){              
     
       Destination::where('id', decrypt($id))
        ->update([
            'name'       => $name
          ]);
      
    }

    public function deleteDestination($id){
        Destination::where('id', decrypt($id))->delete();
    }
}


?>