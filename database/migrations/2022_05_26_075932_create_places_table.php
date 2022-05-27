<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200)->required();
            $table->string('slug');
            $table->tinyInteger('rooms')->unsigned()->nullable();
            $table->tinyInteger('beds')->unsigned()->nullable();
            $table->tinyInteger('bathrooms')->unsigned()->nullable();
            $table->smallInteger('square_meters')->unsigned()->nullable();
            //TODO formatazione            
            $table->string('address')->required();
            $table->decimal('lat', 8 , 6)->required();
            $table->decimal('lng', 9, 6)->required();
            $table->text('img')->nullable();
            $table->boolean('visible')->default(false);
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
        Schema::dropIfExists('places');
    }
}
