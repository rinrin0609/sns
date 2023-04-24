@extends('layouts.login')

@section('content')
<h1 class="follower-title">Follower list</h1>
<div class="follow-list-img">
  @foreach($users as $user)
      <div class="follow-img">
        <a href="/user"><img src="{{ asset('/storage/images/' . $user->images) }}"></a>
      </div>
  @endforeach
</div>

@foreach($users as $user)
<div class="tweet-list">
    <div class="tweet-img">
      <a href="/user"><img src="{{ asset('/storage/images/' . $user->images) }}"></a>
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
        {{ $user ->post }}
      </div>
    </div>
</div>
@endforeach
@endsection
