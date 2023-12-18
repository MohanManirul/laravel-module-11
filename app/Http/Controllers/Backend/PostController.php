<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCrudRequest;
use App\Models\Post;
use App\Services\PostCrudService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $folderPath;
    protected $PostCrudService;
    public function __construct(PostCrudService $PostCrudService)
    {
        $this->folderPath = 'backend.posts.';
        $this->PostCrudService = $PostCrudService ;
    }
    
    // index
    public function index(){
        if ( auth('super_admin')->check() ) {
            $all_posts = Post::select('id','title','image','created_user_type','created_by','is_active','post_date')->orderBy("id","desc")->get();
            return view($this->folderPath.'all-posts',compact('all_posts'));
        }else{
            return view('errors.404');
        }
   }

   //create
   public function create(){
    if ( auth('super_admin')->check() ) {
        return view($this->folderPath.'create');
    }else{
        return view('errors.404');
    }
    
   }

   //store
   public function store(PostCrudRequest $request){
    $post_date = Carbon::now()->format("Y-m-d");
    if ( auth('super_admin')->check() ) {
       try{
           $this->PostCrudService->storePost($request->title, $request->image , $post_date);            
           $redirectRoute = route('post.all');
           return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Post Created Successfully'],200);               
       
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
      $single_post = Post::findOrFail(decrypt($id));
      return view($this->folderPath.'edit', compact('single_post'));
  }else{
    return view('errors.404');
    }
 }


//update
public function update(Request $request,$id){
    $post_date = Carbon::now()->format("Y-m-d");
    if ( auth('super_admin')->check() ) {
    try {
        $my_post = Post::findOrFail(decrypt($id));
        $my_post->title = $request->title;
        $my_post->post_date = $post_date;
        $my_post->is_active = $request->is_active;
    
        // image insert 
        if ($request->image) { 

            //delete that image
            if (File::exists('frontend/assets/task_img/' . $my_post->image)) {
                File::delete('frontend/assets/task_img/' . $my_post->image);
            }
            $image = $request->file('image');
            $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
            $location = public_path('frontend/assets/task_img/' . $img);
            Image::make($image)->save($location);
            $my_post->image = $img;
        }
        if ($my_post->save()) {
            $redirectRoute = route('post.all');
            return response()->json(['redirect' => $redirectRoute , 'redirectMessage' => 'Post Updated Successfully'],200);               
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
    if ( auth('super_admin')->check() ) {
    $my_post = Post::findOrFail(decrypt($id));
    if (!is_null($my_post)) {
        if (File::exists('frontend/assets/task_img/' . $my_post->image)) {
            File::delete('frontend/assets/task_img/' . $my_post->image);
        }
        $my_post->delete();
    }
    session()->flash('success' , 'Post Deleted Successfull... ');
    return back();              

    }
    else{
        return view('errors.404');
        }

    }
}
