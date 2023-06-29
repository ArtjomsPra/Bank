<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoCurrenciesTable extends Migration
{

    public function up()
    {
        Schema::create('crypto_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('rate', 15, 10);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('crypto_currencies');
    }
}
