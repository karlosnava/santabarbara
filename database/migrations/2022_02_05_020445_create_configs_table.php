<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('details');
            $table->longText('value');
            $table->text('type');
            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('configs');
    }
}
