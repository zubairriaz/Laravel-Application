
@extends('layouts.admin')

@section('content')
    <div class="col-lg-10">
<h1> Users </h1>
<table style="width:100%" class="table table-bordered table-responsive table-hover">
<tr>
    <th>Firstname</th>
    <th>Email</th>
    <th>Is Active</th>
    <th>Role</th>
    <th>Created At</th>
    <th>Updated At</th>
</tr>
    @foreach($user as $user )
<tr>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
    <td>{{$user->role->name}}</td>
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>{{$user->updated_at->diffForHumans()}}</td>
</tr>
@endforeach
</table>
    </div>

    @endsection