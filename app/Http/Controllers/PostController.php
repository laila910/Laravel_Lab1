<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //show all posts
    function index() {
        $posts=[
         ['id'=>1,'title'=>'post1','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'laila','createdAt'=>'15/1/2000'],
         ['id'=>2,'title'=>'post2','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'ahmed','createdAt'=>'15/9/2022'],
         ['id'=>3,'title'=>'post3','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'Ali','createdAt'=>'1/3/2022'],
         ['id'=>4,'title'=>'post4','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'mohammed','createdAt'=>'30/1/2022']
        ];

        return view('Posts.index',['posts'=>$posts]);
    }
    // create new post
    function create(){
        return view('Posts.create');
    }
    // store new post
    function store(Request $request){
        // dd($request->all());
        
        $data=$request->all();
        $message='data Stored';
    // return redirect(url('/posts'));
//    return back()->with($message);
return redirect(url('/posts'));
}
    // show data of post
    function show($postId){
        // echo $postId;
        // dd($postId);
        $posts=[
            ['id'=>1,'title'=>'post1','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'laila','createdAt'=>'15/1/2000'],
            ['id'=>2,'title'=>'post2','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'ahmed','createdAt'=>'15/9/2022'],
            ['id'=>3,'title'=>'post3','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'Ali','createdAt'=>'1/3/2022'],
            ['id'=>4,'title'=>'post4','description'=>'with supporting text below as a natural lead-in additional content','postedBy'=>'mohammed','createdAt'=>'30/1/2022']
           ];
           return view('Posts.show',['posts'=>$posts,'postid'=>$postId]);
       
    }
    // Edit New Post
    function edit($postId){
         
        return view('Posts.edit');
    }
    // Update new Post
    function update(Request $request,$postId){
        // echo'post Updated';
        return  redirect(url('/posts'));
    }
    // Delete Post
    function destroy($postId){
        // echo 'post deleted';
        // return Redirect::route('posts.index');
        
        return redirect(url('/posts'));
    }
}
