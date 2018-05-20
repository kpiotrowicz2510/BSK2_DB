@extends('layout')
@section('content')
<form action="{{ url('users/update/'.$user->id) }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div>ID: {{ $user->id }}</div>
    <div>Created: {{ $user->created_at }}</div>
    <div>Updated: {{ $user->updated_at }}</div>
    Email: <input type="text" name="email" value="{{ $user->email }}" style="width:100px"><br>
    Clearance: <select name="clearanceId">
        <? if($clearance <= 1){ ?><option value="1" <? if($user->clearanceId == 1){echo "selected";} ?>>ADMIN</option><? } ?>
        <? if($clearance < 2){ ?><option value="2" <? if($user->clearanceId == 2){echo "selected";} ?>>MANAGER</option><? } ?>
        <? if($clearance < 3){ ?><option value="3" <? if($user->clearanceId == 3){echo "selected";} ?>>USER</option><? } ?>
    </select><br>
    <input  class="btn btn-danger" type="submit" value="SAVE">
</form>
    @stop