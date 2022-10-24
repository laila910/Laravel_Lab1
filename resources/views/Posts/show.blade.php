@extends('layouts.header')
@section('container')



<div class="card mt-5 mx-auto mb-5" style="width: 70%;">
    <div class="card-header">
      Post Info
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <h5><span class="text-black">Title:</span><span class="text-muted">{{$post['title']}}</span></h5>
        <h5><span class="text-black">Description:</span></h5>
        <p>{{$post['description']}}</p>
      </li>
    </ul>
</div>
<div class="card mt-5 mx-auto mb-5" style="width: 70%;">
    <div class="card-header">
      Post Creator Info
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <h5><span class="text-black">Name:</span><span class="text-muted">
          {{-- {{$post['postedBy']}} --}}
          {{$post->user ? $post->user->name : 'Laila'}}
        </span></h5>
        <h5><span class="text-black">Email:</span><span class="text-muted">{{$post->user ? $post->user->email: 'laila@gmail.com'}}</span></h5>
        <h5><span class="text-black">Created At:</span><span class="text-muted">{{ $post->created_at}}</span></h5>
      </li>
   

    </ul>
</div>

     {{-- working with comment here... --}}
     <hr>
  <div class="container">
   
    <div>
      
      <form class="mx-5 mt-5 border border-1 p-5" action="/comments" method="post">
        @csrf
        <input type="hidden" name="_id" value="{{$post['id']}}" >
        <div class="form-group mb-3">
          <label for="exampleInputComment"><h4>Add New Comment</h4></label>
           <input type="text" name="body" class="form-control" id="exampleInputComment" placeholder="drop your comment here :)">
        </div>
           <button  class="btn btn-primary" type="submit">Submit</button>
      </form>

    </div>
    <hr>
    <div class="card bg-warning" style="width: 80%;">
      <div class="card-header">
        Post Comments
      </div>

      <ul class="list-group list-group-flush">
        @if (!count($comments))
          <p>No comments for this post yet</p>
        @endif
         @foreach($comments as $comment)
           <li class="list-group-item">{{$comment['body']}}</li>
           <div class="d-flex flex-row justify-content-start bg-light">

            <button data-toggle="modal" data-target="#exampleModal{{$comment['id']}}" class="btn btn-primary" type="submit">Edit</button>
            {{-- model start --}}
            <div class="modal" id="exampleModal{{$comment['id']}}" tabindex="-1" role="dialog" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('comments.update',$comment['id'])}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_id" value="{{$post['id']}}">
                      <input type="text" name="body" value="{{$comment['body']}}">
                       
                      <div class="not-empty-record">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                      </div>
                  </form>
                  </div>
                  <div class="modal-footer">
                    {{-- <form action="{{route('comments.update',$comment['id'])}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                      <input type="text" name="body" value="{{$comment['body']}}">
                       
                      <div class="not-empty-record">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                      </div>
                  </form> --}}
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <a  href="/posts" class="btn btn-primary">yes</a> --}}
                  </div>
                </div>
              </div>
            </div>
            {{-- model end --}}
            <button data-toggle="modal" data-target="#exModal{{$comment['id']}}" class="btn btn-danger" type="submit">Delete</button>
             {{-- model start --}}
             <div class="modal" id="exModal{{$comment['id']}}" tabindex="-1" role="dialog" >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    you want to delete this comment {{$comment['body']}}
                  
                  </div>
                  <div class="modal-footer">
                    <form action="{{route('comments.destroy',$comment['id'])}}" method="post">
                      @csrf
                      <input type="hidden" name="_method" value="delete">
                      {{-- <input type="hidden" name="_id" value="{{$post['id']}}"> --}}
                  
                       
                      <div class="not-empty-record">
                          <button type="submit" class="btn btn-primary">Delete</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                      </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            {{-- model end --}}
            
             {{-- <form class="d-inline" action="/comments" method="post">
              @csrf
                 <button  class="btn btn-primary" type="submit">Delete</button>
             </form> --}}
           </div>
           
         @endforeach
      </ul>
    </div>
  </div>
@endsection
