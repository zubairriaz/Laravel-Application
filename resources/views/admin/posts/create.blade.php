@extends('layouts.admin')
@section('content')

    <h1>Create Post</h1>




    {!! Form::open(['action'=>'AdminPostController@store' ,'method'=>'Post','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Content') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>6]) !!}
    </div>


    <div class="form-group">
        {!! Form::label('file','Picture') !!}
        {!! Form::file('file',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id',array(''=>'options')+$category,null,['class'=>'form-control']) !!}

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

