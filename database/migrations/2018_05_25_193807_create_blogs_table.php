<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->string('title');
            $table->string('name');
            $table->boolean('enable')->default(false);
            $table->text('content');
            $table->integer('view_count')->unsigned()->default(0);
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');

            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('admins');

            $table->integer('updater_id')->unsigned()->nullable();
            $table->foreign('updater_id')->references('id')->on('admins');

            $table->timestamps();
            $table->softDeletes();
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
