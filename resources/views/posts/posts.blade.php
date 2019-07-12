<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="mb-4 border-bottom p-2">
            <div class="mb-2">
            <img class="mr-2 rounded-circle" src="{{ Gravatar::src($post->user->email, 50) }}" alt="">
            {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
            </div>
                <div>
                    <img src="{{$post->file}}" class="post_image">
                    
                <div class="d-flex bg-light p-1 mt-1">
                    <p class="mb-0 mr-3">{!! nl2br(e($post->month)) !!}</p>
                    <p class="mb-0 mr-3">{!! nl2br(e($post->prefecture)) !!}</p>
                    <p class="mb-0 mr-3">{!! nl2br(e($post->category)) !!}</p>
                </div>
                 <div class="d-flex mt-2">
                      <p class="mr-1">行きたい！</p>
                      <p>@include('likes.likes_button', ['posts' => $posts])</p>
                      
                       <p class="ml-2 font-weight-bold">{{ $post->like_users()->count() }}</p>
                </div>
                    <p class="mb-2">{!! nl2br(e($post->content)) !!}</p>
                </div>
               
                 
                 <div>
                    @if (Auth::id() == $post->user_id)
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-outline-dark btn-sm btn1 mb-1']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
        </li>
    @endforeach
</ul>
{{ $posts->render('pagination::bootstrap-4') }}