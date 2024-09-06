<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('apartment_number')->unique();
            $table->integer('building_number'); // Binanın ID'si
            $table->integer('floor_number');
            $table->integer('room_count');
            $table->enum('status', ['for sale', 'for rent', 'occupied', 'repair']);
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();

            // Foreign Key
            $table->foreign('building_number')->references('building_number')->on('buildings')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
