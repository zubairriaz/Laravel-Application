@extends('layouts.admin')
@section('content')

    <h1>Edit Category</h1>
    {!! Form::model($category,['action'=>['AdminCategoryController@update',$category->id] ,'method'=>'PATCH','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="list-inline">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['action'=>['AdminCategoryController@destroy',$category->id] ,'method'=>'DELETE']) !!}
    <div class="list-inline">
        {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

