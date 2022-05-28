<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenityPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tabella pivot per relazione many to many tra Amenities e Places
        Schema::create('amenity_place', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')
                ->references('id')
                ->on('places')
                ->onDelete('cascade'); // TODO da verificare

            $table->unsignedBigInteger('amenity_id');
            $table->foreign('amenity_id')
                ->references('id')
                ->on('amenities')
                ->onDelete('cascade');

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
        Schema::dropIfExists('amenity_place');
    }
}
