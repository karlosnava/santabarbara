<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('url');
            $table->string('size');
            $table->unsignedBigInteger('album_id');

            // KEYS
            $table->foreign('album_id')
                ->references('id')->on('albums');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}