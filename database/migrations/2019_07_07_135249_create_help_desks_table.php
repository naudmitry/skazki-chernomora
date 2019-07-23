<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpDesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_desks', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('showcase_id')->unsigned();
            $table->unsignedInteger('buyer_id')->nullable();

            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->longText('message');
            $table->string('status');

            $table->timestamps();

            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_desks');
    }
}
