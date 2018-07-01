<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->increments('expcate_id');
            $table->string('expcate_name');
            $table->string('expcate_remarks')->nullable();
            $table->string('expcate_creator');
            $table->integer('expcate_status')->default(1);
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
        Schema::dropIfExists('expense_categories');
    }
}
