<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('orders');
        //crate table
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->float('Total_selling_price');
            $table->string('phone');
            $table->string('province');
            $table->string('district');
            $table->string('ward');
            $table->string('address');
            $table->smallInteger('payment_method');
            $table->smallInteger('customer_id');
            $table->smallInteger('Status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('orders');
    }
};
