@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_user'))
    <p>{{session('deleted_user')}}</p>
    @endif
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
          <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Email</th>
              <th>Role</th>
              <th>Active</th>
                <th>Created </th>
                <th>Updated</th>



          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td><img src="{{$user->photo?$user->photo->file:'https://via.placeholder.com/300/09f/fff.png'}}" height="50" alt=""></td>
            <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>
                  {{$user->is_active==1?'Active':'Not Active'}}
              </td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
              <td>
              {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
              {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
              {!! Form::close() !!}
              </td>
          </tr>
            @endforeach
            @endif
        </tbody>
      </table>




@endsection
