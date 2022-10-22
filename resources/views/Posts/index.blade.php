
@extends('layouts.header')
@section('container')
    {{-- Content Start --}}
    <a href="/posts/create" class="btn btn-primary mt-5">Add New Product</a>
 
        
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
          <td>{{$post['postedBy']}}</td>
          <td>{{$post['createdAt']}}</td>
          <td>
            {{-- <a href="/posts/{{$post['id']}}" class="btn btn-primary">View</a> --}}
          <a href="/posts/{{$post['id']}}"><x-button type="primary"  message="Show"></x-button></a>
          <a href="/posts/{{$post['id']}}/edit"><x-button type="secondary" message="Edit"></x-button></a>
  <a href="/posts/{{$post['id']}}"><x-button type="danger"  data-toggle="modal" data-target="#exampleModal" message="delete"></x-button></a>
   

            {{-- <a href="/posts/{{$post['id']}}/edit" class="btn btn-secondary">Edit</a> --}}
            {{-- <a href="/posts/{{$post['id']}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">Delete</a> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        you want to delete this item ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a  href="/posts" class="btn btn-primary">yes</a>
      </div>
    </div>
  </div>
</div>
    @endsection
 
    {{-- Content End --}}
 
    {{-- Footer Start --}}
    @extends('layouts.footer')
    {{-- Footer End --}}
   