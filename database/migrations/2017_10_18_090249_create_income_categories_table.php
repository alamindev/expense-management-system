<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_categories', function (Blueprint $table) {
            $table->increments('incate_id');
            $table->string('incate_name');
            $table->string('incate_remarks')->nullable();
            $table->string('incate_creator');
            $table->integer('incate_status')->default(1);
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
        Schema::dropIfExists('income_categories');
    }
}
