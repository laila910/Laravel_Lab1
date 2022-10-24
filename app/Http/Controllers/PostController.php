<?php
namespace Carbon\Carbon;


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StoreAndUpdateStoreRequest;


use App\Models\User;



class PostController extends Controller
{
    //show all posts
    function index(Request $request) {
       
        $posts=Post::paginate(6);
        // $posts=Post::all();
    
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
       
        // $data= request()->validate([
        //     'title' => ['required','unique:posts', 'min:3'],
        //     'description' => ['required', 'min:5'],
        // ],[
        //     'title.required' => '* Post Title is Required :(',
        //     'title.min' => '* Post Title must be greater than 3 characters ',
        //     'description.required'=>'* Post Description is Required :(',
        //     'description.min'=>'* Post Description Must be greater Than 5 characters',
        //     'title.unique'=>'* Post Title is already exist :('
        // ]);
        $data=$request->all();
      if(!User::find($request->user_id)){ //check with validation (exist :) 
          return back()->with('failed','Invalid Data');
      }else{
     
        // dd($data);
        Post::create([
            'title' => request()->title,
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
    // return redirect(url('/posts'));
//    return back()->with($message);
// return redirect(url('/posts'));
return redirect()->route('posts.index');
    }
}
    // show data of post
    function show($postId){
        // echo $postId;
        // dd($postId);
        // $posts=[
        //     ['id'=>1,'title'=>'post1','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'laila','createdAt'=>'15/1/2000'],
        //     ['id'=>2,'title'=>'post2','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'ahmed','createdAt'=>'15/9/2022'],
        //     ['id'=>3,'title'=>'post3','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'Ali','createdAt'=>'1/3/2022'],
        //     ['id'=>4,'title'=>'post4','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'mohammed','createdAt'=>'30/1/2022']
        //    ];

        $post = Post::find($postId);
        
//         foreach($post->comment as $comment)
//          {
//    dd($comment);
//         }
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
        // echo'post Updated';
        $data = $request->except('_token','_method');
        // $data=$request->all();
    
      
        // $op = Post::where('id',$request->id)->update($data);
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
