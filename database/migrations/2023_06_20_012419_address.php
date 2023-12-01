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
        //
        // Schema::create('address', function (Blueprint $table) {
        //     $table->id();
        //     // $table->unsignedBigInteger('id_order');
        //     $table->smallInteger('id_customer');
        //     $table->smallInteger('status');
        //     $table->string('province');
        //     $table->string('district');
        //     $table->string('ward');
        //     $table->string('address');
        //     // $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
