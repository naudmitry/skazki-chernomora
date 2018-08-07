<?php

use App\Classes\PageTypesEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('static_page_type')->nullable()->default(null);
            $table->string('title');
            $table->string('type')->default(PageTypesEnum::CUSTOM_PAGE);
            $table->string('display_type')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('view_count')->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('author_id')->unsigned()->nullable()->default(null);
            $table->integer('updater_id')->unsigned()->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('page_categories');
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
        Schema::dropIfExists('pages');
    }
}
