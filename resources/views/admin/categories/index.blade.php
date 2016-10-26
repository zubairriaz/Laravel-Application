@extends('layouts.admin')
@section('content')

    <h1>Categories </h1>
    <div class="col-sm-5">
    <table style="width:100%" class="table table-bordered table-responsive table-hover">
        <tr>
            <th> Id</th>
            <th>Name</th>
        </tr>
        @foreach($category as $category )
            <tr>
                <td><a href="{{route('category.edit',$category->id)}}">{{$category->id}}</a></td>
                <td>{{$category->name}}</td>
            </tr>

    @endforeach
    </div>
    </table>
    @endsection