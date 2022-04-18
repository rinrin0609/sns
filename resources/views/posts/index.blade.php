@extends('layouts.login')

@section('content')
{{ Form::open(['url' => '/post/create'])}}
 {{ Form::text('posts',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
{{ Form::input()}}
{{ Form::close()}}

@endsection
