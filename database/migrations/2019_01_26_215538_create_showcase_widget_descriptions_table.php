<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowcaseWidgetDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showcase_widget_descriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->text('setting');
            $table->string('other')->default('0');

            $table->integer('showcase_widgets_id')->unsigned()->comment('Showcase widget ID');;
            $table->foreign('showcase_widgets_id')->references('id')->on('showcase_widgets')->onDelete('cascade');

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
        Schema::dropIfExists('showcase_widget_descriptions');
    }
}
