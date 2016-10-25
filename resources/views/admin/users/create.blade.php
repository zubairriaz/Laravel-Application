
@extends('layouts.admin')

@section('content')
   <h1>Create User </h1>
   {!! Form::open(['action'=>'AdminUserController@store' ,'method'=>'Post','files'=>true]) !!}
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
      {!! Form::select('status', array(0 => 'Not Active', 1 => 'active'), 1 , ['class'=>'form-control ']) !!}
   </div>
   <div class="form-group">
      {!! Form::label('role','Role') !!}
      {!! Form::select('role', [''=>'Choose Options']+ $role,null,  ['class'=>'form-control ']) !!}
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