<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCryptoAccountTable extends Migration
{

    public function up()
    {
        Schema::create('user_crypto_account', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('crypto_account_id')->constrained('crypto_currency_accounts')
                ->onDelete('cascade');
            $table->foreignId('crypto_currency_id')->constrained('crypto_currencies')
                ->onDelete('cascade');
            $table->decimal('rate', 15, 10);
            $table->decimal('in EUR', 15, 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_crypto_account');
    }
}
