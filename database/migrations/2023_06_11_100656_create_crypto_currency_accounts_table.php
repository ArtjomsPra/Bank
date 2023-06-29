<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoCurrencyAccountsTable extends Migration
{

    public function up()
    {
        Schema::create('crypto_currency_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('account_name');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('crypto_currency_accounts');
    }
}
