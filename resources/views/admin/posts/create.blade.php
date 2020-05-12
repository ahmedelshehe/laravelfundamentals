@extends('layouts.admin')




@section('content')

    <h1>Create Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['action' => 'AdminPostsController@store','files'=>true]) !!}
    <div class="form-group">
        {{Form::label('title', 'Post Title')}}
        <br>
        {{Form::text('title',null,['class'=>'form-control'])}}
    </div>
    <br>


    <div class="form-group">
        {{Form::label('category_id', 'Category')}}
        <br>
        {{Form::select('category_id',[''=>'Choose Options']+ $categories,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('body', 'Description')}}
        <br>
        {{Form::textarea('body',null,['class'=>'form-control'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::label('photo_id', 'Photo')}}
        <br>
        {{Form::file('photo_id',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>




    {!! Form::close() !!}

@endsection
