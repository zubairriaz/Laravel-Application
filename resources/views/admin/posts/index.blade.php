@extends('layouts.admin')
@section('content')

    <h1>Posts </h1>
    <table style="width:100%" class="table table-bordered table-responsive table-hover">
        <tr>
            <th> Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Category</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach($post as $post )
            <tr>
                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{$post->body}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
                <td><img height = "100" src="{{$post->photo->file ? $post->photo->file:'http://placehold.it/400x400'}}" ></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

@endforeach
</table>
@endsection