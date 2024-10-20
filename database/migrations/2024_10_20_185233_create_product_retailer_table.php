<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('product_retailer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('retailer_id')->constrained('retailers')->onDelete('cascade');
            $table->string('retailer_url')->default('')->change();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_retailer');
    }
};
