<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('manufacturer_part_number');
            $table->string('pack_size');
            $table->json('images');
            $table->json('rating_obj');
            $table->json('links');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['manufacturer_part_number', 'user_id']);
        });
        }


    public function down()
    {
        Schema::dropIfExists('products');
    }
};
