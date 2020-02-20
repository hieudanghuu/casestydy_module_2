<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sims', function (Blueprint $table) {
            $table->bigIncrements('sim_id');
            $table->string('sim_name');
            $table->double('sim_price');
            $table->longText('sim_image')->nullable();
            $table->string('deleted_at')->nullable()->default('null');
            $table->unsignedBigInteger('sim_category_id');
            $table->foreign('sim_category_id')->references('category_id')->on('categories');
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
//        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sims');
//        Schema::enableForeignKeyConstraints();
    }
}
