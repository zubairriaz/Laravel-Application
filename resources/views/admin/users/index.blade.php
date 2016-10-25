
@extends('layouts.admin')

@section('content')
    @if(Session('message'))

        <div class="alert alert-danger">
            {{Session('message')}}
        </div>
        @endif
    <div class="col-lg-10">
<h1> Users </h1>
<table style="width:100%" class="table table-bordered table-responsive table-hover">
<tr>
    <th>Firstname</th>
    <th>Email</th>
    <th>Is Active</th>
    <th>Role</th>
    <th>Image</th>
    <th>Created At</th>
    <th>Updated At</th>
</tr>
    @foreach($user as $user )
<tr>
    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
    <td>{{$user->email}}</td>
    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
    <td>{{$user->role->name}}</td>
   <td><img height='100' src="{{$user->photo ? $user->photo->file : '/images/1477321700ID card.jpg'}}" alt=""></td>
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>{{$user->updated_at->diffForHumans()}}</td>
</tr>
@endforeach
</table>
    </div>

    @endsection