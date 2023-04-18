@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="login">
<p class="title">DAWNSNSへようこそ</p>
{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}
<div class="login-btn-div">
{{ Form::submit('LOGIN',['class' => 'login-btn']) }}
</div>
</div>

<p class="register"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
