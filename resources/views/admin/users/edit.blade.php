@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-sm-3">
        <img src="{{$user->photo?$user->photo->file:'https://via.placeholder.com/300/09f.png/fff'}}" class="img-responsive img-rounded" alt="">

    </div>
    <div class="col-sm-9">


    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
    <div class="form-group">
        {{Form::label('name', 'User Name')}}
        <br>
        {{Form::text('name',null,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('email', 'E-Mail Address')}}
        <br>
        {{Form::text('email',null,['class'=>'form-control'])}}
    </div>
    <br>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control'])!!}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('photo_id', 'Upload Photo')}}
        <br>
        {{Form::file('photo_id',null,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('role_id','Role')}}
        <br>
        {{ Form::select('role_id', [''=>'Choose Options']+ $roles,2,['class'=>'form-control'])}}
    </div>

    <br>
    <div class="form-group">
        {{Form::label('is_active','Status')}}
        <br>
        {{ Form::select('is_active', [''=>'Choose Options',0=>'Not Active',1=>'Active'],null,['class'=>'form-control'])}}
    </div>
    {{Form::submit('Update',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
    </div>
@endsection
