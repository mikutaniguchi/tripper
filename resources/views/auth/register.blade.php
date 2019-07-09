@extends('layouts.app')

@section('content')
        
　 <div class="border rounded pt-5 pb-5 mb-5 col-md-6 offset-md-3">
    <div class="text-center pb-3">
        <h2>新規登録</h2>
    </div>

    <div class="row">
        <div class="col-sm-8 offset-sm-2 ">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group p-2">
                    <!--{!! Form::label('name', 'Name') !!}-->
                    {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder'=>'名前']) !!}
                </div>

                <div class="form-group p-2">
                    <!--{!! Form::label('email', 'Email') !!}-->
                    {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder'=>'メールアドレス']) !!}
                </div>

                <div class="form-group p-2">
                    <!--{!! Form::label('password', 'Password') !!}-->
                    {!! Form::password('password', ['class' => 'form-control','placeholder'=>'パスワード']) !!}
                </div>

                <div class="form-group p-2">
                    <!--{!! Form::label('password_confirmation', 'Confirmation') !!}-->
                    {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'確認用パスワード']) !!}
                </div>

                {!! Form::submit('スタート', ['class' => 'btn btn-outline-info btn-block mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection