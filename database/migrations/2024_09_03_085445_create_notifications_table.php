<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id'); // Bildirimi gönderen kullanıcı (admin)
            $table->unsignedBigInteger('user_id')->nullable(); // Bildirimi alan kullanıcı (resident)
            $table->integer('apartment_number')->nullable(); // Apartman numarasına göre bildirim
            $table->integer('building_number')->nullable(); // Bina numarasına göre bildirim
            $table->string('message');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('apartment_number')->references('apartment_number')->on('apartments')->onDelete('cascade');
            $table->foreign('building_number')->references('building_number')->on('buildings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
