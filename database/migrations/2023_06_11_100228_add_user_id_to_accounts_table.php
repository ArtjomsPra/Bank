<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToAccountsTable extends Migration
{

    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
}
