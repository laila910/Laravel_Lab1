<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //show all posts
    function index() {
        // $posts=[
        //  ['id'=>1,'title'=>'post1','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'laila','createdAt'=>'15/1/2000'],
        //  ['id'=>2,'title'=>'post2','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'ahmed','createdAt'=>'15/9/2022'],
        //  ['id'=>3,'title'=>'post3','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'Ali','createdAt'=>'1/3/2022'],
        //  ['id'=>4,'title'=>'post4','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'mohammed','createdAt'=>'30/1/2022']
        // ];
        $posts = Post::all();

        return view('Posts.index',['posts'=>$posts]);
    }
    // create new post
    function create(){
        $Users = User::all();

        return view('Posts.create',[
            'allUsers' => $Users
        ]);
    }
    // store new post
    function store(Request $request){
        // dd($request->all());
        
        $data=$request->all();
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
       
           return view('Posts.show',['post'=>$post]);
       
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
    function update(Request $request){
        // echo'post Updated';
        $data = $request()->all();
        $op = Post::where('id',$request->id)->update($data);
        if($op){
            redirect()->route('posts.index');
        }else{
            echo 'error try again';
        }
        

    }
    // Delete Post
    function destroy($postId){
        // echo 'post deleted';
        // return Redirect::route('posts.index');
        $op = Post::where('id',$postId)->delete();

      if($op){
          
          return redirect()->route('posts.index');
      }else{
          $message = "error try again";
          dd($message);
      }
        
    }
}
