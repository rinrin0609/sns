@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile', 'files' => true ]) !!}
{!! Form::hidden('id',$auth->id) !!}
<div class="prof-update">
  <img class="profile-img" src="{{ asset('/storage/images/' . $auth->images) }}">
    <div class="prof-title">
      {{ Form::label('UserName') }}
    </div>
      <div class="prof-name">
        {{ Form::text('username', $auth->username,['class' => 'prof-form-control', 'id' =>'username']) }}
      </div>
        <div class="prof-title">
          {{ Form::label('MailAdress') }}
        </div>
          <div class="prof-mail">
            {{ Form::text('mail', $auth->mail,['class' => 'prof-form-control', 'id' =>'mail']) }}
          </div>
            <div class="prof-title">
              {{ Form::label('Password') }}
            </div>
              <div class="prof-pass">
                {{ Form::password('password', $auth->password,['class' => 'prof-form-control', 'id' =>'password']) }}
              </div>
                <div class="prof-title">
                  {{ Form::label('new Password') }}
                </div>
                  <div class="prof-new-pass">
                    {{ Form::password('newpassword',null,['class' => 'prof-form-control']) }}
                  </div>
                    <div class="prof-title">
                      {{ Form::label('Bio') }}
                    </div>
                      <div class="prof-bio">
                        {{ Form::text('bio', $auth->bio,['class' => 'prof-form-control', 'id' =>'bio']) }}
                      </div>
                        <div class="prof-title">
                          {{ Form::label('images') }}
                        </div>
                          <div class="prof-img">
                            {{ Form::file('images') }}
                          </div>
                            <div class="prof-btn">
                              {{ Form::submit('更新する') }}
                            </div>
                                {!! Form::close() !!}
</div>
@endsection
