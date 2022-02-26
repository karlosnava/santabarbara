<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('url');
            $table->string('type');
            $table->string('status')->default('active');
            $table->unsignedBigInteger('directory_id')->nullable();
            $table->timestamps();

            // KEYS
            $table->foreign('directory_id')
                ->references('id')->on('directories')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsletters');
    }
};
