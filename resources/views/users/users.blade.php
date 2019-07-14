@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-3 mb-3 rounded" src="{{ Gravatar::src($user->email, 70) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mb-2">{!! link_to_route('users.show', 'プロフィールを見る', ['id' => $user->id]) !!}</div>
                         <div class="col-md-4 col-md-offset-5">@include('user_follow.follow_button', ['user' => $user])</div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->render('pagination::bootstrap-4') }}
@endif