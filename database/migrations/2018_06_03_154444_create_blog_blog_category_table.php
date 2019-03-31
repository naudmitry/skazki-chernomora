<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogBlogCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_blog_category', function (Blueprint $table) {
            $table->integer('blog_id')->unsigned()->index();
            $table->integer('blog_category_id')->unsigned()->index();

            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_blog_category');
    }
}
