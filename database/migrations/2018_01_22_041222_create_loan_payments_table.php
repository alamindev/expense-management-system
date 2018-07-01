<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_payments', function (Blueprint $table) {
            $table->increments('loan_payment_id');
            $table->integer('loaner_id');
            $table->string('loan_payment_amount',10);
            $table->date('loan_payment_date');
            $table->date('loan_payment_replay_date')->nullable();
            $table->string('loan_payment_remarks',100)->nullable();
            $table->integer('loan_payment_status')->default(1);
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
        Schema::dropIfExists('loan_payments');
    }
}
