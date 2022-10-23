
@extends('layouts.header')
@section('container')
    {{-- Content Start --}}
    <a href="{{route('posts.create')}}" class="btn btn-primary mt-5">Add New Post</a>
 
        
    <table class="table container mt-5">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Posted By</th>
          <th scope="col">Created At</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
      
        <tr>
          <th scope="row">{{$post['id']}}</th>
          <td>{{$post['title']}}</td>
          {{-- <td>{{$post['postedBy']}}</td> --}}
          <td>{{$post->user ? $post->user->name : 'Not Defined'}}</td>
          {{-- <td>{{$post['created_at']->format('Y-m-d')}}</td> --}}
          <td>{{$post['created_at']->toDateString()}}</td>
          {{-- {{$task->created_at->toFormattedDateString()}} --}}

          <td>
           
          <a href="{{route('posts.show', $post['id'])}}"  style="text-decoration: none;"><x-button type="primary"  message="Show"></x-button></a> 
         
          <a style="text-decoration:none;" href="{{route('posts.edit', $post['id'])}}"><x-button type="secondary" message="Edit"></x-button></a>
       
          <a data-toggle="modal" data-target="#exampleModal{{$post['id']}}" style="text-decoration: none;"><x-button type="danger"   message="delete"></x-button></a>
          
          </td>
        </tr>
        <div class="modal" id="exampleModal{{$post['id']}}" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               {{$post['title']}}
              </div>
              <div class="modal-footer">
                <form action="{{route('posts.destroy',$post['id'])}}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="delete">
                   
                  <div class="not-empty-record">
                      <button type="submit" class="btn btn-primary">Delete</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                  </div>
              </form>
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a  href="/posts" class="btn btn-primary">yes</a> --}}
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
    <!-- Modal -->

    @endsection
 
    {{-- Content End --}}
 
    {{-- Footer Start --}}
    @extends('layouts.footer')
    {{-- Footer End --}}
   