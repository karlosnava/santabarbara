<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('audio');
            $table->string('duration');
            $table->string('order');
            $table->string('status')->default('active');
            $table->unsignedBigInteger('podcast_id');

            // KEYS
            $table->foreign('podcast_id')
                ->references('id')->on('podcasts');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
