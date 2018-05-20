
@extends('layout')
@section('content')
    <table class="table table-bordered table-hover">
    <tr>
        <td>ID</td>
        <td>Updated</td>
        <td>User</td>
        <td>Status</td>
        <td>Clearance</td>
        <td>Actions</td>
    </tr>
    @foreach($Reservations as $reservation)
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->updated_at }}</td>
            <td>{{ $reservation->getUser() }}</td>
            <td>{{ $reservation->getStatus() }}</td>
            <td>{{ $reservation->getClearance() }}</td>
            <td>
                <? if($clearance <= 2){ ?> <a href="{{ url('reservations/edit/'.$reservation->id) }}"  class="btn-sm btn-danger">EDIT</a> <? } ?>
                <? if($clearance <= 1){ ?> <a href="{{ url('reservations/delete/'.$reservation->id) }}"  class="btn-sm btn-danger">DELETE</a> <? } ?>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{ url('reservations/create') }}" class="btn btn-danger">NEW RESERVATION</a>
    @stop
