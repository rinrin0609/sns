@extends('layouts.login')

@section('content')
{!! Form::open(['url' => '/user', 'files' => true ]) !!}
{!! Form::hidden('id',$auth->id) !!}

<img src="{{ asset('/storage/images/' . $user_prof->images) }}">

{{ $user_prof->username }}
{{ $user_prof ->bio }}

@if($followings->contains('follow_id',$user_prof->id))
    <form action="/user/{id}/delete" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user_prof->id }}">
    <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
@else
    <form action="/user/{id}/create" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user_prof->id }}">
    <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
@endif

@foreach($users as $user)
  <div class="tweet-list">
    <div class="tweet-img">
      <img class="profile-img" src="{{ asset('/storage/images/' . $user->images) }}">
    </div>
    <div class="post-wrapper">
      <div class="post-status">
        <div class="tweet-username">
          {{ $user->username }}
        </div>
        <div class="tweet-created-at">
          {{ $user->created_at}}
        </div>
      </div>
      <div class="tweet-post">
        {{ $user->post }}
      </div>
@endforeach
@endsection
