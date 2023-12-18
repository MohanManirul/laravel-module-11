<?php
namespace App\Services;

use App\Models\Sales;
use Carbon\Carbon;

class SalesService{
    public function storeSale($product_id , $unit_price , $sales_quantity , $total_price){
        $day   = Carbon::now()->day;
        $month   = Carbon::now()->month;
        Sales::create([
            'product_id'        => $product_id,
            'unit_price'        => $unit_price,
            'sales_quantity'    => $sales_quantity,
            'total_price'       => $total_price,
            'day'               => $day,
            'month'             => $month,
          ]);
    }
   
}


?>