
@extends('layouts.header')
@section('container')
    {{-- Content Start --}}
    @if(session()->has('success'))

    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>

@endif
    <a href="{{route('posts.create')}}" class="btn btn-primary mt-5 mb-2">Add New Post</a>
    <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col col-md-6">Posts Data </div>
              <div class="col col-md-6 text-right">
                  @if(request()->has('view_deleted'))

                  <a href="{{ route('posts.index') }}" class="btn btn-info btn-sm">View All Post</a>

                  <a href="{{ route('post.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>

                  @else

                  <a href="{{ route('posts.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary btn-sm">View Deleted Post</a>
                
                  @endif
                  
              </div>
          </div>
      </div>
    </div>
  
    <div class="card-body">
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
    @if(count($posts) > 0)
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
          @if(request()->has('view_deleted'))
          <a href="{{ route('post.restore', $post->id) }}" class="btn btn-success btn-sm">Restore</a>
          @else
          <a data-toggle="modal" data-target="#exampleModal{{$post['id']}}" style="text-decoration: none;"><x-button type="danger"   message="delete"></x-button></a>
          @endif   
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
    @else
        <tr>
          <td colspan="4" class="text-center">No Post Found</td>
      </tr>
      @endif
    </tbody>
    </table>
  </div>
  @if(request()->has('view_deleted'))
  @else
    {{$posts->links()}}
  @endif

    <style>
      .w-5{
        display:none;
      }
    </style>
   
    <!-- Modal -->

    @endsection
 
    {{-- Content End --}}
 
    {{-- Footer Start --}}
    @extends('layouts.footer')
    {{-- Footer End --}}
   