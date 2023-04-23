@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/user', 'files' => true ]) !!}
{!! Form::hidden('id',$auth->id) !!}

<img src="{{ asset('/storage/images/' . $auth->images) }}">

{{ $user->username }}
{{ $user ->bio }}
@if(!$users->isEmpty())
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

@foreach($posts_list as $list)
  <div class="tweet-list">
    <div class="tweet-img">
      <img class="profile-img" src="{{ asset('/storage/images/' . $list->images) }}">
    </div>
    <div class="post-wrapper">
      <div class="post-status">
        <div class="tweet-username">
          {{ $list->username }}
        </div>
        <div class="tweet-created-at">
          {{ $list->created_at}}
        </div>
      </div>
      <div class="tweet-post">
        {{ $list ->post }}
      </div>
@endsection
