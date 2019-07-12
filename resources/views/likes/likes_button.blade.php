   @if (Auth::user()->is_like($post->id))
        {!! Form::open(['route' => ['likes.unlike', $post->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn_remove text-danger p-0", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['likes.like', $post->id]]) !!}
            {!! Form::button('<i class="far fa-heart"></i>', ['class' => "btn_remove text-danger p-0", 'type' => 'submit']) !!}
        {!! Form::close() !!}
    @endif