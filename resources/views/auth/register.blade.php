@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2 class="new-user">新規ユーザー登録</h2>

<div class="new-login">
{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'register-input']) }}
{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'register-input']) }}
{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'register-input']) }}
{{ Form::label('Password confirm') }}
{{ Form::password('password-confirm',['class' => 'register-input']) }}
<div class="register-btn-div">
{{ Form::submit('REGISTER',['class' => 'register-btn']) }}
</div>
<p class="login-back"><a href="/login">ログイン画面へ戻る</a></p>
</div>
{!! Form::close() !!}


@endsection
