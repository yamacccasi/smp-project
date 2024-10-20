<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('scrapped_data', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->json('images');
            $table->json('rating');
            $table->integer('avg_rating');
            $table->foreignId('session_id')->constrained('scrapping_sessions')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('retailer_id')->constrained('retailers')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('scrapped_data');
    }
};
