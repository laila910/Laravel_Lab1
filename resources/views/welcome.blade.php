@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @guest
                <div class="card-body">
                    @if (!session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ _('welcome to our Blog') }}
                        </div>
                    @endif
             
                    {{ __('You are not login in!') }}
                    <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                 @else
                 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{route('posts.index')}}" class="btn btn-success">See All Posts</a>
                </div>
                @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection