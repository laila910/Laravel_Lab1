@extends('layouts.header')
@section('container')
<form class="mx-5 mt-5 border border-1 p-5" method="post" action="/posts">
    @csrf;
    <div class="form-group mb-3">
      <label for="exampleInputtitle"><h4>Title</h4></label>
      <input type="text" name="title" class="form-control" id="exampleInputtitle"  placeholder="Enter Post Title">
     
    </div>
    <div class="form-group mb-3">
      <label for="exampleInputdesc"><h4>Description</h4></label>
      <textarea size="3" name="description" class="form-control" id="exampleInputdesc" placeholder="Post Description">
      </textarea>
    </div>
    <div class="form-group mb-3">
        <label for="exampleInputPostcreator">Post Creator</label>
        <select class="form-control" id="exampleInputPostcreator" name="postcreator" placeholder="Post Creator">
            <option value="1">Ahmed</option>
            <option value="2">Laila</option>
            <option value="3">Omar</option>
        </select>
      </div>
    <button type="submit" class="btn btn-primary mb-3">Edit</button>
  </form>
@endsection
@extends('layouts.footer')