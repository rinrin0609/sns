@extends('layouts.login')

@section('content')
<img class="profile-img" src="{{ asset('/storage/images/' . $auth->images) }}">
{{ $auth->username }}
@foreach($tests as $test)
{{ $test->post}}
{{ $test->created_at }}
@endforeach
@endsection
