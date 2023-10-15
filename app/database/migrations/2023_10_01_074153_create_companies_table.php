<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_fname');
            $table->string('admin_lname');
            $table->string('comp_name');
            $table->string('admin_email');
            $table->text('confirm_code');
            $table->string('created_on');
            $table->tinyInteger('status')->default(0)->comment('0:unverified|1:active|2:suspended|3:unpaid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
