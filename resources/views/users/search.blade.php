@extends('layouts.login')

@section('content')
<div class="search">
  <div class="follow-search">
    <form action="/search" method="post">
      @csrf
        <input type="text" class="search-placeholder" name="search" placeholder="ユーザー名">
          <button type="submit">検索</button>
    </form>
  </div>
</div>

<div class="following-list">
  @if(!$users->isEmpty())
    <div class="following-wrapper">
  @foreach($users as $user)
      <div class="tweet-img">
          <img class="profile-img" src="{{ asset('/storage/images/' . $user->images) }}">
      </div>
          <div class="following-status">
              {{$user->username}}
          </div>
            <div class="following-area">
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
            </div>
            @endif
            @else
            @endif
            @endforeach
            @else
            <p>検索結果はありません</p>
            @endif
  </div>
</div>
@endsection
