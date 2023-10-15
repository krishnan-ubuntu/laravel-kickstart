<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->constrained('companies');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('password', 200);
            $table->text('salt');
            $table->enum('role', ['admin', 'manager', 'user']);
            $table->date('created_on');
            $table->tinyInteger('status')->default(1)->comment('1:active|2:suspended|3:deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
