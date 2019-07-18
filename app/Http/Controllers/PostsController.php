<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

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
        $post = new Post;
        $this->validate($request, [
            
            'file' => 'required|file|image|mimes:jpg,jpeg,png|max:10240',
            'month' => 'required|max:191',
            'prefecture' => 'required|max:191',
            'category' => 'required|max:191',
            'content' => 'required|max:191',
        ],
        
        [
             'file.required' => '写真は必須です',
             'month.required'  => '月は必須です',
             'prefecture.required'  => '都道府県は必須です',
             'category.required'  => 'カテゴリーは必須です',
             'content.required'  => 'コメントは必須です',
         ]
        
        );
        
        
       
        if ($request->file('file')->isValid([])) {
            
            
            $file = $request->file('file');
        
            
            // バケットの`trippermiku`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('trippermiku', $file, 'public');
            // アップロードした画像のフルパスを取得
            // dd(Storage::disk('s3')->url($path));
            $post->file = Storage::disk('s3')->url($path);
         
            
  

            
             $request->user()->posts()->create([
                'file' => Storage::disk('s3')->url($path),
                'month' => $request->month,
                'prefecture' => $request->prefecture,
                'category' => $request->category,
                'content' => $request->content,
                
                
             ]);
             


        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
        

       return back();
    }
    
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //編集ページ
    public function edit($id)
    {
        //Taskモデルから$idのidをもつレコードを1件取得する
        $post = Post::find($id);
         
        if (\Auth::id() === $post->user_id) {
        // edit.blade.phpの内容表示
        return view('posts.edit', [
            'post' => $post,
        ]);
        }
        return redirect('/');
    }
    
    public function update(Request $request, $id)
    {
        //何かしらの制限します
        $this->validate($request, [
    
            // タスクの制限（空欄だめ、文字以内）
            'month' => 'required|max:191',
            'prefecture' => 'required|max:191',
            'category' => 'required|max:191',
            'content' => 'required|max:191',
            
        ]);
        //Postモデルから$idのidをもつレコードを1件取得する
        $post = Post::find($id);
     
        //入力されたタスクを取得
        $post->month = $request->month;
        $post->prefecture = $request->prefecture;
        $post->category = $request->category;
        $post->content = $request->content;
        // 保存
        $post->save();
        ////top画面に戻る
        return redirect('/');
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
