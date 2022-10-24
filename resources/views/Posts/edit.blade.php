@extends('layouts.app')
@section('content')
<form class="mx-5 mt-5 border border-1 p-5" method="post" action="{{route('posts.update',$post['id'])}}">
    @csrf
    
       <input type="hidden" name="_method" value="PATCH">
    <div class="form-group mb-3">
      <label for="exampleInputtitle"><h4>Title</h4></label>
      <input type="text" name="title" class="form-control" id="exampleInputtitle" value="{{$post['title']}}" placeholder="Enter Post Title">
     
    </div>
    <div class="form-group mb-3">
      <label for="exampleInputdesc"><h4>Description</h4></label>
      <textarea size="3" name="description" class="form-control" id="exampleInputdesc" placeholder="Post Description">
        {{$post['description']}}
      </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPostcreator">Post Creator</label>
        <select class="form-control" id="exampleInputPostcreator" name="user_id" value="{{$post['user_id']}}" placeholder="Post Creator">
            {{-- <option value="1">Ahmed</option>
            <option value="2">Laila</option>
            <option value="3">Omar</option> --}}
            @foreach ($allUsers as $user)
             
               <option value="{{$user->id}}"   @if ($post['user_id']==$user->id) selected  @endif >{{ $user->name }}</option>
             
              
            @endforeach
        </select>
      </div>
    <button type="submit" class="btn btn-primary mb-3">Edit</button>
  </form>
@endsection
