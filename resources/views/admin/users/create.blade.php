@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['action' => 'AdminUsersController@store','files'=>true]) !!}
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
        {{Form::label('password', 'Password')}}
            <br>
        {{Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) ) }}
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
    {{Form::submit('Save',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}
@endsection
