@extends('layouts.login')

@section('content')
<h1>Follower list</h1>

<table>
  @foreach($users as $user)
  <div class="list">
  <tr>
    <td><a href="/profile"><img src="/images/{{$user->images}}" alt=""></a></td>
  </tr>
  </div>
  @endforeach

  @foreach($users as $user)
  <div class="follow-tweet">
  <tr>
            <td><img src="{{ asset('/storage/images/' . $user->images) }}"></td>
            <td>{{ $user->username }}</td>
            <td>{{ $user ->post }}</td>
            <td>{{ $user->created_at}}</td>
  </tr>
  </div>
  @endforeach

</table>
@endsection
