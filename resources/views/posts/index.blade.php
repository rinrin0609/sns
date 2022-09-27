@extends('layouts.login')

@section('content')
{{ Form::open(['url' => '/post/create'])}}
{{ Form::text('post',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
{{ Form::submit('投稿する')}}
{{ Form::close()}}

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
