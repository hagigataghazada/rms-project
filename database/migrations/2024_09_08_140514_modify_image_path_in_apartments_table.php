<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->text('image_path')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->string('image_path')->nullable()->change();
        });
    }
};
