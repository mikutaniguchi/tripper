   @if (Auth::user()->is_like($post->id))
        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('行きたい！', ['class' => "btn-warning"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
            {!! Form::submit('行きたい！', ['class' => "btn-outline-secondary"]) !!}
        {!! Form::close() !!}
    @endif