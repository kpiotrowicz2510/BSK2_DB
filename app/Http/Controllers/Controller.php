<?php

namespace App\Http\Controllers;

use App\ApplicationUser;
use App\Clearance;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getCurrentUserClearance(Request $request){
        $user = ApplicationUser::where('id', $request->cookie('userid'))->first();
        if($user!=null) {
            $clearance = Clearance::where('id', $user->clearanceId)->first();
            View::share('clearanceName', $clearance->name);
            View::share('clearance', $user->clearanceId);
            return $user->clearanceId;
        }
        abort(403);
    }
}
