<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{

    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->double('rate', 10, 5);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}
