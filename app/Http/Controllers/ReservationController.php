<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\ReservationSeat;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = Reservation::where('clearanceId', '>=', $this->getCurrentUserClearance($request))->get();
        return view('reservationlist', ['Reservations'=>$reservations, 'clearance'=>$this->getCurrentUserClearance($request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $reservation = new Reservation();
        $this->getCurrentUserClearance($request);
        return view('newreservation', ['reservation'=>$reservation]);
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
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($this->getCurrentUserClearance($request) > 2){
            abort(403);
        }
        $reservation = Reservation::where('id', $id)->first();
        $this->getCurrentUserClearance($request);
        return view('editreservation', ['reservation'=>$reservation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation, $id)
    {
        if($this->getCurrentUserClearance($request) > 2){
            abort(403);
        }
        $user = Reservation::where('id', $id)->first();
        if($user==null){
            $user = new Reservation();
            $user->name = "New super reservation";
            $user->userId = $request->userId;
        }
        $user->clearanceId = $request->clearanceId;
        $user->reservationStatus = $request->reservationStatus;
        $user->save();
        $sn = 1;
        $sr = 1;
        for($i=0;$i<$request->seats;$i++){
            $seat = new ReservationSeat();
            $seat->seatNumber = $sn++;
            $seat->seatRow = $sr++;
            $seat->clearanceId = $request->clearanceId;
            $seat->reservationId = $user->id;
            $seat->reservationStatus = $request->reservationStatus;
            $seat->save();
        }
        return redirect()->to('reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($this->getCurrentUserClearance($request) > 1){
            abort(403);
        }
        $user = Reservation::where('id', $id)->first();
        if($user==null){
            abort(404);
        }
        $user->delete();
        return redirect()->back();
    }
}
