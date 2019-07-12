
@extends('layouts.app')

@section('content')
   @if (Auth::check())
        <div class="row">
            <aside class="col-sm-3">
                @include('users.card', ['user' => Auth::user()])
            </aside>
            <div class="col-sm-9">
                @if (Auth::id() == $user->id)
                 <div class="form-group">
                   @include('posts.create', ['posts' => $posts])
                </div>
                @endif
                @if (count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif
            </div>
        </div>
    @else
      <div class="jumbotron jumbotron-extend">
            <div class="text-center mt-5">
                <h1 class="display-4 mb-5 font-weight-light text-white">旅の感動を共有しよう</h1>
                {!! link_to_route('signup.get', 'Tripperを始める', [], ['class' => 'btn btn-lg btn-info']) !!}
            </div>
        </div>
    @endif
@endsection

