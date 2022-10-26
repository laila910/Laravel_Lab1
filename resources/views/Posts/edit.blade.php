@extends('layouts.app')
@section('content')
<form class="mx-5 mt-5 border border-1 p-5" method="post" action="{{route('posts.update',$post['id'])}}" enctype="multipart/form-data">
    @csrf
       <input type="hidden" name="_method" value="PUT">
     
    <div class="form-group mb-3">
      <label for="exampleInputtitle"><h4>Title</h4></label>
      <input type="text" name="title" class="form-control" id="exampleInputtitle" value="{{old('title', $post->title)}}" placeholder="Enter Post Title">
    </div>
    <div class="form-group mb-3">
      <label for="exampleInputdesc"><h4>Description</h4></label>
      <textarea size="3" name="description" class="form-control" id="exampleInputdesc" placeholder="Post Description">
        {{$post['description']}}
      </textarea>
    </div>
    <div class="mb-3 form-group">
      <label for="formFile" class="form-label"><h4>Post Image</h4></label>
      <input class="form-control" name="image" type="file" id="formFile" >
    </div>
    <input type="hidden" name="oldImage" value="{{$post['image']}}">
    <div class="mb-3" style="width: 10%">
      <img src="{{asset('uploads/'.$post->image)}}" width="100%" class="rounded" >
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPostcreator">Post Creator</label>
        <select class="form-control" id="exampleInputPostcreator" name="user_id" placeholder="Post Creator">
            @foreach ($allUsers as $user)
               <option value="{{$post['user_id']}}">{{ $user->name }}</option>
            @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-primary mb-3">Edit</button>
  </form>
@endsection
