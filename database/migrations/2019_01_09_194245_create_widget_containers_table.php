<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_containers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('showcase_id')->unsigned();
            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');

            $table->string('type');

            $table->string('widgetable_type')->nullable()->default(null);
            $table->integer('widgetable_id')->nullable()->default(null);

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
        Schema::dropIfExists('widget_containers');
    }
}
