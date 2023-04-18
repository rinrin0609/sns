@extends('layouts.login')

@section('content')
<div>
<form action="/search" method="post">
@csrf
<input type="text" name="search" placeholder="ユーザー名">
<button type="submit">検索</button>
</form>
</div>

@if(!$users->isEmpty())
<table>
@foreach($users as $user)
  <tr>
    <td><img src="{{ asset('/storage/images/' . $user->images) }}"></td>
    <td>{{$user->username}}</td>
    @if($auth->id != $user->id)
@if($followings->contains('follow_id',$user->id))
    <form action="/follow/delete" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user->id }}">
    <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
@else
    <form action="/follow/create" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user->id }}">
    <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
@endif
@else
<td></td>
<td></td>
@endif
  </tr>
@endforeach
</table>
@else
<p>検索結果はありません</p>
@endif
@endsection
