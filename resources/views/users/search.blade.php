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


@if(!$users->isEmpty())
<div class="following-list">
@foreach($users as $user)
    <div class="following-wrapper">
      <div class="following-img">
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
                        <button type="submit" class="following-btn">フォロー解除</button>
                  </form>
              @else
                <form action="/follow/create" method="POST">
                  {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$user->id }}">
                      <button type="submit" class="following-btn">フォローする</button>
                </form>
              @endif
              @else
              @endif
            </div>
    </div>
            @endforeach
            @else
            <p>検索結果はありません</p>
            @endif
</div>
@endsection
