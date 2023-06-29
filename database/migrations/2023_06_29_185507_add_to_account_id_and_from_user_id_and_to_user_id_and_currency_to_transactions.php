<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToAccountIdAndFromUserIdAndToUserIdAndCurrencyToTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignId('to_account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('from_user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('to_user_id')->constrained('users')->onDelete('cascade');
            $table->string('currency', 3)->default('EUR');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_id_and_from_user_id_and_to_user_id_and_currency_to_transactions', function (Blueprint $table) {
            //
        });
    }
}
