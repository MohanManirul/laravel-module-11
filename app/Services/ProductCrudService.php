<?php
namespace App\Services;

use App\Models\Product;


class ProductCrudService{
    public function storeProduct($name,$quantity,$price){
     
        Product::create([
            'name'              => $name,
            'quantity'          => $quantity,
            'price'             => $price,
            'created_by'        => getAuthUserId(),
            'created_user_type' => getAuthUserType(),
          ]);
    }
    
    //update
    public function updateProduct($name,$quantity,$price, $id){              
     
        Product::where('id', decrypt($id))
        ->update([
            'name'       => $name,
            'quantity'   => $quantity,
            'price'      => $price,
          ]);
    }

    public function deleteProduct($id){
        Product::where('id', decrypt($id))->delete();
    }
}


?>