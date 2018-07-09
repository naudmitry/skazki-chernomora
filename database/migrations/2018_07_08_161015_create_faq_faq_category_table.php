<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqFaqCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_faq_category', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('faq_id')->unsigned();
            $table->integer('faq_category_id')->unsigned();

            $table->timestamps();

            $table->foreign('faq_id')->references('id')->on('faqs');
            $table->foreign('faq_category_id')->references('id')->on('faq_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_faq_category');
    }
}
