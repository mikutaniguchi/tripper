@extends('layouts.app')

@section('content')
   
    <div class="text-center mb-5 m-5">
            <h1>旅の感動を共有しよう</h1>
     </div>
        
　 <div class="border rounded pt-5 pb-5 mb-5 col-md-6 offset-md-3">
    <div class="text-center">
        <h2>新規登録</h2>
    </div>

    <div class="row">
        <div class="col-sm-8 offset-sm-2">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('スタート', ['class' => 'btn btn-outline-info btn-block mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection