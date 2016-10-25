
@extends('layouts.admin')

@section('content')
    <h1>Update User </h1>
    <div class="col-sm-3">
        <img src="{{$user->photo->file}}" alt="" class="img-responsive img-rounded">



    </div>
    <div class="col-sm-9">
    {!! Form::model($user,['action'=>['AdminUserController@update',$user->id] ,'method'=>'PATCH','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('confirm_password','Confirm Password') !!}
            {!! Form::password('confirm_password',['class'=>'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('file','Picture') !!}
        {!! Form::file('file',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status','Status') !!}
        {!! Form::select('status', array(0 => 'Not Active', 1 => 'active'), $user->is_active , ['class'=>'form-control ']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role','Role') !!}
        {!! Form::select('role',$role ,$user->role->id,  ['class'=>'form-control ']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
    </div>
        {!! Form::close() !!}
        {!! Form::open(['action'=>['AdminUserController@destroy',$user->id] ,'method'=>'DELETE']) !!}
        <div class="form-group">

            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
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
    </div>
@endsection