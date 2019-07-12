<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 
use App\Post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
     public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'posts' => $posts,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        // userモデルから$idのidをもつレコードを1件取得する
        $user = User::find($id);
        // そのユーザーのフォローを１０件まで表示
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function likes($id)
    {
        // postモデルから$idのidをもつレコードを1件取得する
        $post = Post::find($id);
        // そのポストidはlikeしてきたユーザーの数を取得する
        $posts = $post->like_users()->get();
        
        $data = [
            // どのpostの
            'post' => $post,
            // ユーザー数を取得するか
            'like_users' => $likes,
        ];
        // postsの数をカウントする
        $data += $this->counts($posts);

        return view('users.show', $data);
    }
}
