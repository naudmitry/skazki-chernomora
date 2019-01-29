<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowcaseWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showcase_widgets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('class_name');
            $table->string('location');
            $table->integer('position');
            $table->boolean('action');
            $table->boolean('single')->default(false);

            $table->integer('container_id')->unsigned();
            $table->foreign('container_id')->references('id')->on('widget_containers')->onDelete('cascade');

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
        Schema::dropIfExists('showcase_widgets');
    }
}
