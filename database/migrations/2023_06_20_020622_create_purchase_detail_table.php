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
        // Schema::create('purchase_detail', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('id_purchase');
        //     $table->unsignedBigInteger('id_product');
        //     $table->integer('quantity');
        //     $table->string('price');
        //     $table->foreign('id_purchase')->references('id')->on('purchase')->onDelete('cascade');
        //     $table->foreign('id_product')->references('id')->on('product')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('purchase_detail');
    }
};
