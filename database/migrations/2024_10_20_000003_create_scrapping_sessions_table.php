<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrappingSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('scrapping_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('retailer_id')->constrained('retailers')->onDelete('cascade');
            $table->date('session_date');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('scrapping_sessions');
    }
};
