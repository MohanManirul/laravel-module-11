<?php
namespace App\Services;

use App\Models\BusOperator;

class BusOperatorCrudService{
    public function storeBusOperator($name){
        BusOperator::create([
            'name' => $name
          ]);
    }
    
    //update
    public function updateBusOperator($name , $id){              
     
       BusOperator::where('id', decrypt($id))
        ->update([
            'name'       => $name
          ]);
      
    }

    public function deleteBusOperator($id){
        BusOperator::where('id', decrypt($id))->delete();
    }
}


?>