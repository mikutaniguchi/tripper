@extends('layouts.app')

@section('content')
　　<div class="border rounded pt-5 pb-5 col-md-6 offset-md-3">
    <div class="text-center pb-3">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-8 offset-sm-2">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group p-2">
                    <!--{!! Form::label('email', 'メールアドレス') !!}-->
                    {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder'=>'メールアドレス']) !!}
                </div>

                <div class="form-group p-2">
                    <!--{!! Form::label('password', 'パスワード') !!}-->
                    {!! Form::password('password', ['class' => 'form-control','placeholder'=>'パスワード']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-outline-info btn-block mt-4']) !!}
            {!! Form::close() !!}

            <p class="mt-2">初めての方はこちら→ {!! link_to_route('signup.get', '新規登録') !!}</p>
        </div>
    </div>
    </div>
    
@endsection