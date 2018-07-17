<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('name');
            $table->boolean('enable')->default(false);
            $table->longText('content')->nullable();
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('faqs');
    }
}
