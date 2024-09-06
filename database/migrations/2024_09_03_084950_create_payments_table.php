<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('apartment_number'); // Apartman numarası
            $table->enum('type', ['water', 'gas', 'electricity', 'elevator']);
            $table->decimal('amount', 8, 2);
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->string('invoice_image')->nullable();
            $table->timestamps();

            // Foreign key constraints (optional)
            $table->foreign('apartment_number')->references('apartment_number')->on('apartments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
