<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->index();
            $table->string('name');
            $table->boolean('enable')->default(false);
            $table->string('link')->nullable();
            $table->string('img_or_video')->nullable();
            $table->longText('content')->nullable();
            $table->integer('view_count')->unsigned()->default(0);
            $table->string('breadcrumbs')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->integer('author_id')->unsigned()->nullable();
            $table->integer('updater_id')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('admins');
            $table->foreign('updater_id')->references('id')->on('admins');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
