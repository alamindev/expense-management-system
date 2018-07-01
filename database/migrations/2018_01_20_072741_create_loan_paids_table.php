<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanPaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_paids', function (Blueprint $table) {
            $table->increments('loan_paid_id');
            $table->integer('loaner_id');
            $table->string('loan_paid_amount',10);
            $table->date('loan_paid_date');
            $table->date('loan_paid_replay_date')->nullable();
            $table->string('loan_paid_remarks',100)->nullable();
            $table->integer('loan_paid_status')->default(1);
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
        Schema::dropIfExists('loan_paids');
    }
}
