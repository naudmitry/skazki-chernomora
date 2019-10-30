<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->string('entity_type')->index();
            $table->unsignedInteger('entity_id')->index();
            $table->string('event');
            $table->string('object_type')->index();
            $table->unsignedInteger('object_id')->index();
            $table->unsignedInteger('showcase_id');
            $table->unsignedInteger('author_id');
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
        Schema::dropIfExists('histories');
    }
}
