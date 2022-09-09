@extends('layouts.login')

@section('content')
{{ Form::open(['url' => '/post/create'])}}
{{ Form::text('post',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
{{ Form::submit('投稿する')}}
{{ Form::close()}}

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- Javascript・jQueryのファイルリンク -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/script.js"></script>
</head>
<body>
<table>
  @foreach($posts_list as $list)
    <tr>
    <td><img src="/images/{{ $list -> images }}"></td>
    <td>{{ $list->username }}</td>
    <td>{{ $list ->post }}</td>
    <td>{{ $list->created_at}}</td>
    <td><div class="edit-content">
    <a href="" class="modalopen" data-target="{{ $list->id }}">
      <img class="edit-img" src="/images/edit.png" alt="更新">
    </a>
    </div>
    <div class="modal-main js-modal" id="{{ $list->id }}">
            {{ Form::open(['url' => '/post/update']) }}
            {{ Form::hidden('id', $list->id) }}
            {{ Form::input('text', 'upPost', $list->post, ['required', 'class' => 'form-control']) }}
            <input type="image" src="/images/edit.png" alt="更新ボタン">
            {{ Form::close() }}
    </div>
    </td>
    <td><a href="/post/{{$list ->id}}/delete"onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"> <img src="{{ asset('images/trash_h.png') }}" alt="削除" ></a></td>
  </tr>
  @endforeach
</table>
@endsection
