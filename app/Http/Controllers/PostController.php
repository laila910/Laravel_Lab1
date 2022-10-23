<?php
namespace Carbon\Carbon;


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

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
        // $posts = Post::all();
        $posts=Post::paginate(6);
    //    dd($posts);
    //    Carbon::Date();
    // $carbon=Carbon::now();
    //   $year=2022;
    //   $month=10;
    //   $day=23;
    //   $tz = 'Europe/Madrid';
  foreach($posts as $post){
    // $post['created_at']=$post->created_at;

    //  $post['created_at'] = Carbon::parse($post->created_at);
      
//    $post['created_at']= $post['created_at']->format('Y-m-d');
 
// echo $post['created_at'];
    //  echo $date;
    //  $post->created_at=$date;
    //  dd($post->created_at);
// $date=Carbon::now();
// $date=$post['created_at'];
// $date=$date->isoFormat('Y-M-D');
// $post['created_at']=$date;
// $date;
// dd($post['created_at']);

// $post['created_at']=$post['created_at']->isoFormat('Y-M-D');

// dd($post['created_at']->isoFormat('Y-M-D'));
// $post['created_at']=$post['created_at']->isoFormat('Y-M-D');


// dd($post['created_at']);
//    $post->created_at=Carbon::now();
//    $post->created_at->toDateTimeString();
//    $date=$post->created_at->toDateTimeString();
//    dd($date);
//    $date= $post['created_at']->toDateTimeString();
   
//    $date=Carbon::createFromIsoFormat('Y-M-D H:mm:ss',$date);
   
//     $date->isoFormat('Y-M-D');

//    $post['created_at']=$date->isoFormat('Y-M-D');
//    $post['created_at'];
  }
        // $carbon::createFromFormat('Y-m-d','2022-10-23')->toDateTimeString();
        // $date =Carbon::parse('2018-06-15 17:34:15.984512','UTC');
    //     // echo $date->isoFormat('Y-m-d');
    //     $date=Carbon::createFromIsoFormat('!YYYY-MMMM-D h:mm:ss a','2019-January-3 6:33:24 pm','UTC');
    //  echo $date->isoFormat('Y-M-D');
    
        // dd($date);
    
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
    function update(Request $request,$postId){
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
