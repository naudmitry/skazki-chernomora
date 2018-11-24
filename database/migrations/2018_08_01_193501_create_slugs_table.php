<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slugs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('showcase_id')->unsigned();
            $table->string('slug');
            $table->string('entity_type')->nullable();
            $table->integer('entity_id')->nullable();

            $table->timestamps();

            $table->foreign('showcase_id')->references('id')->on('showcases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slugs');
    }
}
