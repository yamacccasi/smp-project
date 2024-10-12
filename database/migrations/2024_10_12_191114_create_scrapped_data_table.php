<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrappedDataTable extends Migration
{
    public function up()
    {
        Schema::create('scrapped_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('retailer_id')->constrained('retailers')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('rating');
            $table->string('avg_rating');

        });
    }


    public function down()
    {
        Schema::dropIfExists('scrapped_data');
    }
};
