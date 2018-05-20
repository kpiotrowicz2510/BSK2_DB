<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   public function getUser(){
       $user = ApplicationUser::where('id', $this->userId)->first();
       if($user) {
           return $user->email;
       }else{
           return "";
       }
   }
    public function getStatus(){
        switch($this->reservationStatus){
            case 0:
                return "NEW";
                break;
            case 1:
                return "RESERVED";
                break;
            case 2:
                return "CANCELED";
                break;
        }
    }
    public function getClearance(){
        return Clearance::where('id', $this->clearanceId)->first()->name;
    }
    public function getSeats(){
        return ReservationSeat::where('reservationId', $this->id)->get();
    }
}
