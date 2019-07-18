<ul class="list-unstyled">
    @foreach ($posts as $post)
        <li class="border-bottom p-1">
            <div class="mb-1 mt-2">
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
             
                    <p>{!! nl2br(e($post->content)) !!}</p>
                    
                </div>
                 <div class="d-flex justify-content-end mb-2">
                    @if (Auth::id() == $post->user_id)
                     <p> {!! Form::open(['route' => ['posts.edit', $post->id], 'method' => 'GET']) !!}
                            {!! Form::submit('編集する', ['class' => 'btn btn-light btn-sm mr-4']) !!}
                         {!! Form::close() !!}
                     </p>
                     <p>
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除', ['class' => 'btn btn-outline-dark btn-sm']) !!}
                        {!! Form::close() !!}
                    </p>
                    @endif
                </div>
        </li>
    @endforeach
</ul>
{{ $posts->render('pagination::bootstrap-4') }}