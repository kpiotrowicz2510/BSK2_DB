<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationUser extends Model
{
    public function getClearance(){
        return Clearance::where('id', $this->clearanceId)->first()->name;
    }
}
