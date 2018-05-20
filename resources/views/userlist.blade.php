@extends('layout')
@section('content')
<table class="table table-bordered table-hover">
    <tr>
        <td>ID</td>
        <td>Updated</td>
        <td>Email</td>
        <td>Clearance</td>
        <td>Actions</td>
    </tr>
    @foreach($Users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->getClearance() }}</td>
            <td><? if($user->clearanceId > $clearance||$clearance == 1){ ?><a href="{{ url('users/edit/'.$user->id) }}" class="btn-sm btn-danger">EDIT</a><? } ?></td>
        </tr>
    @endforeach
</table>
<? if(2 >= $clearance){ ?><a href="{{ url('users/create') }}" class="btn btn-danger">NEW USER</a><? } ?>
@stop
