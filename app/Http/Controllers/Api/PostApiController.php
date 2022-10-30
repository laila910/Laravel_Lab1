<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostCollection;
use App\Http\Resources\V1\PostResource;
use App\Models\Post;
use App\Http\Requests\StoreAndUpdateStoreRequest;
class PostApiController extends Controller
{
    public function index(){
        return  new PostCollection(Post::paginate());
    }
    public function store(StoreAndUpdateStoreRequest $request){
        $image=time().'.'.$request->image->extension();  
        return new PostResource(Post::create([
             'title' => request()->title,
             'description' => $request->description,
             'user_id' => $request->user_id,
             'image'=>$image
         ])); 
         $request->image->move(public_path('uploads'), $image); 
    }
  
    public function show( Post $post){
       
        return new PostResource($post);
    }
    Public function update(StoreAndUpdateStoreRequest $request,Post $post){ 

            if ($request->image) {
                Storage::delete('uploads/' . $request->oldImage);
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
            }else{
                $imageName=$request->oldImage;
            }
          
             $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'image'=>$imageName
            ]);  
            return new PostResource($post);

        }
    Public function destroy(Post $post){
           
           $post->delete(); 
           return 'Post Deleted';  
    }
}
