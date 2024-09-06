<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->integer('apartment_number')->nullable();
            $table->integer('building_number')->nullable();
            $table->string('role')->default('user');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('apartment_number')->references('apartment_number')->on('apartments')->onDelete('cascade');
            $table->foreign('building_number')->references('building_number')->on('buildings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'apartment_number')) {
                $table->dropColumn('apartment_number');
            }
        });
    }
}
