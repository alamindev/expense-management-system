<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaners', function (Blueprint $table) {
            $table->increments('loaner_id');
            $table->string('loaner_name');
            $table->string('loaner_phone')->unique();
            $table->string('loaner_email');
            $table->string('loaner_remarks');
            $table->integer('loaner_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaners');
    }
}
