<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{

   public function index(){
    return view('frontend.index');
   }
    public function home(){
        $all_posts= Post::with(['user','super_admin'])->select('title','image','created_user_type','post_date','created_by')->where('is_active', true)->get();
        $all_author = User::select('id','name')->get();
        // return view('frontend.home',compact('all_posts'));
        return view('frontend.all-posts',compact(['all_posts','all_author']));
    }

    public function publicSearch(Request $request){
 
     $user_id = $request->get('user_id');
     $searchInput = $request->get('search');
    if($user_id){
        if($user_id){
            $publicPostSearchResult = Post::with(['user','super_admin'])->select('id','title','image','created_user_type','created_by','is_active','post_date')
              ->where('created_user_type', 'user')
              ->where('created_by', 'like', $user_id)
              ->orderBy("id","desc")
              ->take(20)
              ->get();
              if( $publicPostSearchResult){
                  return response()->json(['publicPostSearchResult'=>$publicPostSearchResult], 200);
              }
         }else{
            $publicPostSearchResult = Post::orderBy("id","desc")->select('id','title','image','created_user_type','created_by','is_active','post_date')
            ->where('created_user_type', 'user')
            ->where('created_by', 'like', $user_id)
            ->orderBy("id","desc")
            ->take(20)
            ->get();
            return response()->json(['publicPostSearchResult'=>$publicPostSearchResult], 200);
         } 
    }else{
         if($searchInput){
              $searchResult = Post::with(['user','super_admin'])->select('id','title','image','created_user_type','created_by','is_active','post_date')
              ->whereDate('post_date', 'like', $searchInput)
              ->orderBy("id","desc")
              ->take(20)
              ->get(); 
              if( $searchResult){
                  return response()->json(['searchResult'=>$searchResult], 200);
              }
           }else{
              $searchResult = Post::orderBy("id","desc")->select('id','title','image','created_user_type','created_by','is_active','post_date')->take(20)->get();
              return response()->json(['searchResult'=>$searchResult], 200);
           }
    }
           

          
      }
}
