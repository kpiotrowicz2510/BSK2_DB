<?php

namespace App\Http\Controllers;

use App\ApplicationUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class ApplicationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clearance = $this->getCurrentUserClearance($request);
        $users = ApplicationUser::where('clearanceId','>', $clearance)->orWhere('id',$request->cookie('userid'))->get();
        return view('userlist', ['Users'=>$users,'clearance'=>$clearance]);
    }

    public function loginGet(Request $request){
        $this->getCurrentUserClearance($request);
        return view('login');
    }

    public function login(Request $request){
        $user = ApplicationUser::where('email',$request->email)->first();

        if($user!=null&&Hash::check($request->password, $user->password)) {
            return redirect()->to('/reservations')->withCookie(cookie('username', $user->email, 45000))->withCookie(cookie('userid', $user->id, 45000));
        }else{
            return redirect()->to('/users/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->getCurrentUserClearance($request);
        $user = new ApplicationUser();
        $user->id = 1000;
        return view('edituser', ['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApplicationUser  $applicationUser
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationUser $applicationUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationUser  $applicationUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = ApplicationUser::where('id', $id)->first();
        $this->getCurrentUserClearance($request);
        return view('edituser', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationUser  $applicationUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationUser $applicationUser, $id)
    {
        $user = ApplicationUser::where('id', $id)->first();
        if($user==null){
            $user = new ApplicationUser();
            $user->password=Hash::make('test123');
        }
        $user->clearanceId = $request->clearanceId;
        $user->email = $request->email;
        $user->save();
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationUser  $applicationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationUser $applicationUser)
    {
        //
    }
}
