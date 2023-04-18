@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile', 'files' => true ]) !!}
{!! Form::hidden('id',$auth->id) !!}

<img src="{{ asset('/storage/images/' . $auth->images) }}">

{{ Form::label('UserName') }}
{{ Form::text('username', $auth->username,['class' => 'form-control', 'id' =>'username']) }}

{{ Form::label('MailAdress') }}
{{ Form::text('mail', $auth->mail,['class' => 'form-control', 'id' =>'mail']) }}

{{ Form::label('Password') }}
{{ Form::text('password', $auth->password,['class' => 'form-control', 'id' =>'password']) }}

{{ Form::label('new Password') }}
{{ Form::text('newpassword',null,['class' => 'input']) }}

{{ Form::label('Bio') }}
{{ Form::text('bio', $auth->bio,['class' => 'form-control', 'id' =>'bio']) }}

{{ Form::label('images') }}
{{ Form::file('images') }}

{{ Form::submit('更新する') }}

{!! Form::close() !!}

@endsection
