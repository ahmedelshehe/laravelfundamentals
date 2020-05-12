@extends('layouts.admin')




@section('content')

    <h1>Posts</h1>
    <table class="table table-striped">
        <thead>
          <tr>
                <th>Title</th>
                <th>Body</th>
              <th>User</th>
              <th>Photo</th>
              <th>Category</th>
              <th>Created At</th>
              <th>Updated At</th>
          </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
          <tr>

            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
              <td>{{$post->user->name}}</td>
              <td><img src="{{$post->photo?$post->photo->file:'https://via.placeholder.com/300/09f/fff.png'}}" height="50" alt=""></td>
              <td>{{$post->category?$post->category->name:'Not Defined'}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>


          </tr>
            @endforeach
        @endif

        </tbody>
      </table>

@endsection
