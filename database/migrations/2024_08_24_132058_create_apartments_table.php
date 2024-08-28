// database/migrations/YYYY_MM_DD_create_apartments_table.php
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
            $table->string('apartment_id')->unique(); // Benzersiz yapıldı
            $table->integer('room_count');
            $table->integer('floor_number');
            $table->enum('status', ['occupied', 'for_rent', 'for_sale', 'repair']);
            $table->decimal('price', 8, 2)->nullable(); // Decimal alanı için boyutlar belirlendi
            $table->unsignedBigInteger('building_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
