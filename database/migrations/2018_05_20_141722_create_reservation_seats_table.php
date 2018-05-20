<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clearanceId');
            $table->integer('reservationId');
            $table->integer('seatNumber');
            $table->integer('seatRow');
            $table->integer('reservationStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_seats');
    }
}
