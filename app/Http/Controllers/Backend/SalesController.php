<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalesRequet;
use App\Services\SalesService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    protected $folderPath;
    protected $SalesService;
    public function __construct(SalesService $SalesService)
    {
        $this->folderPath = 'backend.sales.';
        $this->SalesService = $SalesService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {
             $all_sales = DB::table('sales')
                                ->leftJoin('products','sales.product_id' , '=' , 'products.id')
                                ->get();
                
            return view($this->folderPath.'index',compact('all_sales'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        $all_products = DB::table('products')->select('id','name','quantity','price')->latest()->get();
        return view($this->folderPath.'create', compact('all_products'));
    }else{
        return view('errors.404');
    }
    
   }

   // get product stock start 
   public function getProductStock(Request $request){
        $product_id = $request->product_id;
        $stock = DB::table('products')->where('id' , $product_id)->first()->quantity;        
        return response()->json($stock);

    }
    // get product stock ends


    //get unit price start
    public function getUnitPrice(Request $request){
        $product_id = $request->product_id;
        $unit_price = DB::table('products')->where('id' , $product_id)->first()->price;        
        return response()->json($unit_price);

    }
    //get unit price ends

    //get unit price start
    public function getTotalPrice(Request $request){
        $product_id = $request->product_id;
        $unit_price = DB::table('products')->where('id' , $product_id)->first()->price;        
        return response()->json($unit_price);

    }
    //get unit price ends


   //store
   public function store(SalesRequet $request){
   
    if ( auth('super_admin')->check() ) {
       try{
           $this->SalesService->storeSale($request->product_id , $request->unit_price , $request->sales_quantity , $request->total_price); 
           
           $redirectRoute = route('sales.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Sales Generated Successfully'],200);               
       
       }catch(Exception $e){
           return response()->json(['error' => $e->getMessage()], 200);

       }
    }else{
        return view('errors.404');
    }

  }

  //edit
  public function edit($id)
  {  
    if ( auth('super_admin')->check() ) {
     $single_product = DB::table('sales')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_product'));
  }else{
    return view('errors.404');
    }
 }


}

