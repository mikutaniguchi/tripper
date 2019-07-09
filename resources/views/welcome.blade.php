<?php 
    $prefectures = [
        '' => '都道府県',
  '北海道' => '北海道', 
  '青森県' => '青森県', 
  '岩手県' => '岩手県', 
  '宮城県' => '宮城県',
  '秋田県' => '秋田県', 
  '山形県' => '山形県', 
  '福島県' => '福島県', 
  '茨城県' => '茨城県',
  '栃木県' => '栃木県', 
  '群馬県' => '群馬県', 
  '埼玉県' => '埼玉県', 
  '千葉県' => '千葉県',
  '東京都' => '東京都', 
  '神奈川県' => '神奈川県', 
  '新潟県' => '新潟県', 
  '富山県' => '富山県',
  '石川県' => '石川県', 
  '福井県' => '福井県', 
  '山梨県' => '山梨県', 
  '岐阜県' => '長野県', 
  '岐阜県' => '岐阜県', 
  '静岡県' => '静岡県', 
  '愛知県' => '愛知県', 
  '三重県' => '三重県',
  '滋賀県' => '滋賀県', 
  '京都府' => '京都府', 
  '大阪府' => '大阪府', 
  '兵庫県' => '兵庫県',
  '奈良県' => '奈良県', 
  '和歌山県' => '和歌山県', 
  '鳥取県' => '鳥取県', 
  '島根県' => '島根県',
  '岡山県' => '岡山県', 
  '広島県' => '広島県', 
  '山口県' => '山口県', 
  '徳島県' => '徳島県',
  '香川県' => '香川県',
  '愛媛県' => '愛媛県',
  '高知県' => '高知県', 
  '福岡県' => '福岡県',
  '佐賀県' => '佐賀県', 
  '長崎県' => '長崎県', 
  '熊本県' => '熊本県', 
  '大分県' => '大分県',
  '宮崎県' => '宮崎県', 
  '鹿児島県' => '鹿児島県', 
  '沖縄県' => '沖縄県'
  ];
  
  $months = [
  '' => '月', 
  '1月' => '1月', 
  '2月' => '2月', 
  '3月' => '3月', 
  '4月' => '4月', 
  '5月' => '5月', 
  '6月' => '6月', 
  '7月' => '7月', 
  '8月' => '8月', 
  '9月' => '9月', 
  '10月' => '10月', 
  '11月' => '11月', 
  '12月' => '12月'
    ];
    
  $categorys = [
      
  '' => 'カテゴリー', 
  '景色' => '景色', 
  'グルメ' => 'グルメ', 
  '宿泊' => '宿泊',
  '歴史' => '歴史',
  '観光' => '観光', 
  '遊び' => '遊び', 
  '自然' => '自然', 
  ];
?>

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
                           {!! Form::open(['route' => 'posts.store','files' => true]) !!}
                             {!! Form::label('file', '画像', ['class' => 'control-label']) !!}
                             {!! Form::file('file') !!}
                           {{ Form::select('month', $months, null, ['class' => 'hoge mt-2']) }}
                           {{ Form::select('prefecture', $prefectures, null, ['class' => 'hoge']) }}
                           {{ Form::select('category', $categorys, null, ['class' => 'hoge']) }}
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control mt-2', 'rows' => '2']) !!}
                           {!! Form::submit('投稿', ['class' => 'btn btn-info btn-block mt-2']) !!}
                        </div>
                {!! Form::close() !!}
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
   <style type="text/css">
          h1{
              letter-spacing: 15px;
              
             }
        .text-white{
            text-shadow: 2px 2px 5px black;
            
        }
        .btn{
            box-shadow: 3px 5px white;
        }
          .jumbotron-extend{
              height: 800px;
              width: 100%;
              background: url("/img/tripper.png");
              background-size: cover;
              }
   </style>
