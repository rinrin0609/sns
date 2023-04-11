@extends('layouts.login')

@section('content')
<div class="create">
{{ Form::open(['url' => '/post/create'])}}
<img class="create-img" src="{{ asset('/storage/images/' . $auth->images) }}">
{{ Form::text('post',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
<input type="image" src="/images/post.png" alt="投稿ボタン">
{{ Form::close()}}
</div>


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
      @if($auth->id === $list->user_id)
      <div class="edit-content">
        <a href="" class="modalopen" data-target="{{ $list->id }}">
        {{ csrf_field() }}
        <img class="edit-img" src="/images/edit.png" alt="更新">
        </a>
        <a href="/post/{{$list ->id}}/delete"onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"> <img class="edit-img" src="{{ asset('images/trash_h.png') }}" alt="削除" ></a>
      </div>
      @endif
    </div>
  </div>
  @endforeach
@endsection
