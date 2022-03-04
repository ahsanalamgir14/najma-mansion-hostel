<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('room_type');
            $table->string('rent');
            $table->string('floor')->nullable()->default(null);
            $table->string('room_holder')->nullable()->default(null);
            $table->string('room_owner')->nullable()->default(null);;
            $table->string('is_one_person')->nullable()->default(0);
            $table->string('is_two_person')->nullable()->default(0);
            $table->string('is_multiple_person')->nullable()->default(0);
            $table->string('is_vip')->nullable()->default(0);
            $table->string('is_one_bed')->nullable()->default(0);
            $table->string('is_two_bed')->nullable()->default(0);
            $table->string('is_double_bed')->nullable()->default(0);
            $table->string('is_one_mattress')->nullable()->default(0);
            $table->string('is_two_mattress')->nullable()->default(0);
            $table->string('is_double_mattress')->nullable()->default(0);
            $table->string('is_attach_washroom')->nullable()->default(0);
            $table->string('is_combine_washroom')->nullable()->default(0);
            $table->longText('images')->nullable()->default(null);
            // $table->longText('attributes')->nullable()->default(null);

            $table->foreign('room_type')->references('id')->on('room_types')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
