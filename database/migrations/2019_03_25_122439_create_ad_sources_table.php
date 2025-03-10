<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_sources', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->boolean('is_enabled')->default(false);
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('sort')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_sources');
    }
}
