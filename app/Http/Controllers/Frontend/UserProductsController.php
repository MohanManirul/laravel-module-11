<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCrudRequet;
use App\Models\Product;
use App\Services\ProductCrudService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProductsController extends Controller
{
    protected $folderPath;
    protected $ProductCrudService;
    public function __construct(ProductCrudService $ProductCrudService)
    {
        $this->folderPath = 'frontend.products.';
        $this->ProductCrudService = $ProductCrudService ;
    }
    
    // index
    public function index(){
        if ( auth('user')->check() ) {            
             $all_products = DB::table('products')->select('id','name','quantity','price','price')->latest()->where(['created_user_type'=>'user', 'created_by' => auth('user')->user()->id])->get();
            return view($this->folderPath.'index',compact('all_products'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('user')->check() ) {
        return view($this->folderPath.'create');
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(ProductCrudRequet $request){
    if ( auth('user')->check() ) {
       try{
           $this->ProductCrudService->storeProduct($request->name , $request->quantity , $request->price); 
           
           $redirectRoute = route('user.products.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Product Created Successfully'],200);               
       
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
    if ( auth('user')->check() ) {
     $single_product = DB::table('products')->where('id' , decrypt($id))->first();
      return view($this->folderPath.'edit', compact('single_product'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(Request $request,$id){
    if ( auth('user')->check() ) {
    try {
        try{
            $this->ProductCrudService->updateProduct($request->name , $request->quantity , $request->price , $id); 
            
            $redirectRoute = route('user.products.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Product Updated Successfully'],200);               
        
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 200);
 
            }
        } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 200);
    }
    }else{
        return view('errors.404');
        }
}

//delete
public function delete($id){
    if (auth('user')->check()) {
        $my_product = Product::findOrFail(decrypt($id));
        if (!is_null($my_product)) {           
            $my_product->delete();
        }
        session()->flash('success' , 'Product Deleted Successfull... ');
        return back();              
        }else {
            return view('errors.404');
        }
    }

}

