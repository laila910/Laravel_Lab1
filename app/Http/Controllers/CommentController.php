<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // store new comment
    function store(Request $request){  
         Comment::create(
            [
                'body'=>$request->body,
                'commentable_type'=>'Post',
                'commentable_id'=>$request->_id,
                
            ]
         );
         $post = Post::find($request->_id);
        return redirect()->route('posts.show',['post'=>$post]);
    }
    // update comment
    function update(Request $request,$commentId){
      
        $data = $request->except('_token','_method','_id');
        $op=Comment::where('id',$commentId)->update($data);
        $post = Post::find($request->_id);
       
        if($op){
            return redirect()->route('posts.show',['post'=>$post]);
            
        }else{
            echo 'error try again';
        }
    }
    // Delete comment
    function destroy($commentId){
        // echo 'post deleted';
        // return Redirect::route('posts.index');
        $comment=Comment::find($commentId);
      
        $post = Post::find($comment->commentable_id);
        $op = Comment::where('id',$commentId)->delete();

      if($op){
        return redirect()->route('posts.show',['post'=>$post]);

    }else{
          $message = "error try again";
          dd($message);
      }
        
    }
}
