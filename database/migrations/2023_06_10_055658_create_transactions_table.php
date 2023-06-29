<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->enum('transaction_type', ['transfer', 'deposit', 'purchase', 'withdrawal']);
            $table->double('amount', 10, 2);
            $table->string('additional_info')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
