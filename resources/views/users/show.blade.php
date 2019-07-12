@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-3">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-9">
             @include('users.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
                @include('posts.create', ['posts' => $posts])
            @endif
            @if (count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
 
        </div>
    </div>
@endsection