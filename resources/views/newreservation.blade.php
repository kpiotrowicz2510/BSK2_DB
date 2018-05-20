@extends('layout')
@section('content')
<form action="{{ url('reservations/update/100') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div>ID: NEW</div>
    <div>Created: {{ $reservation->created_at }}</div>
    <div>Updated: {{ $reservation->updated_at }}</div>
    <div>Seats: <input type="text" name="seats" value=""><br></div>
    User: <input type="text" name="userId" value=""><br><br>
    Status: <select name="reservationStatus">
        <option value="0" <? if($reservation->reservationStatus == 0){echo "selected";} ?>>NEW</option>
        <option value="1" <? if($reservation->reservationStatus == 1){echo "selected";} ?>>RESERVED</option>
        <option value="2" <? if($reservation->reservationStatus == 2){echo "selected";} ?>>CANCELED</option>
    </select><br>
    Clearance: <select name="clearanceId">
        <option value="1" <? if($reservation->clearanceId == 1){echo "selected";} ?>>ADMIN</option>
        <option value="2" <? if($reservation->clearanceId == 2){echo "selected";} ?>>MANAGER</option>
        <option value="3" <? if($reservation->clearanceId == 3){echo "selected";} ?>>USER</option>
    </select><br>
    <input class="btn btn-danger" type="submit" value="SAVE">
</form>
    @stop