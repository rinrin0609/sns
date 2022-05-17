@extends('layouts.login')

@section('content')
{{ Form::open(['url' => '/post/create'])}}
{{ Form::text('posts',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
{{ Form::submit('投稿する')}}
{{ Form::close()}}

foreach($post_create as $posts)
<tr>
  <td>{{ $user_id ->'user_id'}}</td>
  <td>{{ $post ->'post'}}</td>
  <td>{{ $created_at ->'created_at'}}</td>
  <td><img src = "/images/dawn.png{{ $image -> image }}"></td>
</tr>

@endsection
