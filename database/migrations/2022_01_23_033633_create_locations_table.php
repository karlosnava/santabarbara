<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('image');
            $table->string('direction');
            $table->string('phone');
            $table->string('opens');
            $table->string('closes');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
