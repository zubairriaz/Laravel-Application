@extends('layouts.admin')
@section('content')

    <h1>Create Category</h1>




    {!! Form::open(['action'=>'AdminCategoryController@store' ,'method'=>'Post','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="list-inline">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
    </div>

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

