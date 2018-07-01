<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_receiveds', function (Blueprint $table) {
            $table->increments('loan_rec_id');
            $table->integer('loaner_id');
            $table->string('loan_rec_amount',10);
            $table->date('loan_rec_date');
            $table->date('loan_replay_date');
            $table->string('loan_remarks',100)->nullable();
            $table->integer('loan_rec_status')->default(1);
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
        Schema::dropIfExists('loan_receiveds');
    }
}
