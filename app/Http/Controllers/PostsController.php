<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            //⭐️
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2000',
            'month' => 'required|max:10',
            'prefecture' => 'required|max:10',
            'category' => 'required|max:10',
            'content' => 'required|max:191',
            
        ]);

        $request->user()->posts()->create([
            'photo' => $request->photo,
            'month' => $request->month,
            'prefecture' => $request->prefecture,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        return back();
    }
    
        public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return back();
    }
}
