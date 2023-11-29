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
        schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_category')->index()->unsigned();
            $table->string('name');
            $table->integer('quantity');
            $table->string('description');
            $table->string('export_price');
            $table->string('import_price');
            $table->string('image');
            $table->timestamps();
            $table->smallInteger('Is_Active');
            $table->foreign('id_category')->references('id')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
