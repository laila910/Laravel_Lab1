<?php
namespace Carbon\Carbon;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StoreAndUpdateStoreRequest;
use App\jobs\ProneOldPostsJob;

class PostController extends Controller
{
    //show all posts
    function index(Request $request) {
        dispatch(new ProneOldPostsJob());
        $posts=Post::all(); 
        $posts=Post::paginate(6);
        if($request->has('view_deleted'))
        {  
            $posts = Post::onlyTrashed()->get();
        }
        return view('Posts.index',compact('posts'));
    }
    // create new post
    function create(){
        $Users = User::all();
        return view('Posts.create',[
            'allUsers' => $Users
        ]);
    }
    // store new post
    function store(StoreAndUpdateStoreRequest $request){
        $data=$request->all();    
            Post::create([
                'title' => request()->title,
                'description' => $data['description'],
                'user_id' => $data['post_creator'],
            ]);
            return redirect()->route('posts.index');   
     }
    // show data of post
    function show($postId){
        $post = Post::find($postId);
        $comments=Comment::where('commentable_id',$postId)->get();
        return view('Posts.show',['post'=>$post,'comments'=>$comments]);
    }
    // Edit New Post
    function edit($postId){
        $Users = User::all();
        $post = Post::find($postId);
        return view('Posts.edit',[
            'allUsers' => $Users,'post'=>$post
        ]);
    }
    // Update new Post
    function update(StoreAndUpdateStoreRequest $request,$postId){
        $data = $request->except('_token','_method');
        $op=Post::where('id',$postId)->update($data);
        if($op){
           return redirect()->route('posts.index');
        }else{
            echo 'error try again';
        } 
    }
    // Delete Post
    function destroy($postId){
        $op = Post::where('id',$postId)->delete();
      if($op){
        //   return redirect()->route('posts.index');
        return back()->with('success', 'Post Deleted successfully');
      }else{
          $message = "error try again";
          dd($message);
      }
        
    }
    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
        return back()->with('success', 'Post Restore successfully');
    }
    public function restore_all()
    {
        Post::onlyTrashed()->restore();
        return back()->with('success', 'All Post Restored successfully');
    }
}
