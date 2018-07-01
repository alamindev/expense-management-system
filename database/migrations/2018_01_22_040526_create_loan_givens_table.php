<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanGivensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_givens', function (Blueprint $table) {
            $table->increments('loan_given_id');
            $table->integer('loaner_id');
            $table->string('loan_given_amount',10);
            $table->date('loan_given_date');
            $table->date('loan_given_replay_date');
            $table->string('loan_given_remarks',100)->nullable();
            $table->integer('loan_given_status')->default(1);
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
        Schema::dropIfExists('loan_givens');
    }
}
