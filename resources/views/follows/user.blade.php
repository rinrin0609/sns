@extends('layouts.login')

@section('content')
<div class="user-prof">
    <img class="user-prof-img" src="{{ asset('/storage/images/' . $user_prof->images) }}">
    <div class="user-prof-name">
      <p class="user-prof-title">Name</p>
      {{ $user_prof->username }}
    </div>
      <div class="user-prof-bio">
        <p class="user-prof-title">Bio</p>
        {{ $user_prof ->bio }}
      </div>
        <div class="user-prof-btn">
          @if($followings->contains('follow_id',$user_prof->id))
            <form action="/user/delete" method="POST">
              {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$user_prof->id }}">
                  <button type="submit" class="btn btn-danger">フォロー解除</button>
            </form>
          @else
            <form action="/user/create" method="POST">
              {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$user_prof->id }}">
                  <button type="submit" class="btn btn-primary">フォローする</button>
            </form>
          @endif
        </div>
</div>

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
    </div>
</div>
@endforeach
@endsection
