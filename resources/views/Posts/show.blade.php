@extends('layouts.header')
@section('container')
@foreach ($posts as $post)
@if ($post['id']== $postid)

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
          {{$post->user ? $post->user->name : 'Not Defined'}}
        </span></h5>
        <h5><span class="text-black">Email:</span><span class="text-muted">{{$post->user ? $post->user->email: 'Not Defined'}}</span></h5>
        <h5><span class="text-black">Created At:</span><span class="text-muted">{{$post['created_at']}}</span></h5>
      </li>
   

    </ul>
</div>
@endif
@endforeach

@endsection
@extends('layouts.footer')