<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_retailer', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('retailer_id')->constrained('retailers')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->primary(['user_id', 'retailer_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_retailer');
    }
};
