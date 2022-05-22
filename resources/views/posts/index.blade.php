@extends('layouts.login')

@section('content')
{{ Form::open(['url' => '/post/create'])}}
{{ Form::text('posts',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
{{ Form::submit('投稿する')}}
{{ Form::close()}}

@endsection

foreach($posts_list as $list)
<tr>
  <td>{{ $list ->user_id}}</td>
  <td>{{ $list ->post}}</td>
  <td>{{ $list ->created_at}}</td>
  <td><img src = "/images/dawn.png{{ $list -> image }}"></td>
</tr>
@endforeach
