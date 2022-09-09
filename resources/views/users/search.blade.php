@extends('layouts.login')

@section('content')
<div>
<form action="/search" method="post">
@csrf
<input type="text" name="search" placeholder="ユーザー名">
<button type="submit">検索</button>
</form>
</div>

@if(isset($users))
<table>
@foreach($users as $user)
  <tr>
    <td>{{$user->image}}</td>
    <td>{{$user->username}}</td>
  </tr>
@endforeach
</table>
@endif
@if(!empty($message))
<div class="alert alert-primary" role="alert">{{ $message}}</div>
@endif
</div>
@endsection
