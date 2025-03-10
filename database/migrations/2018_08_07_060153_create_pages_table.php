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

            $table->integer('company_id')->unsigned();
            $table->integer('showcase_id')->unsigned();
            $table->string('static_page_type')->nullable();
            $table->string('type')->default(PageTypesEnum::CUSTOM_PAGE);
            $table->string('title')->index()->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('enable')->index()->default(false);
            $table->integer('view_count')->default(0)->index();
            $table->string('breadcrumbs')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('author_id')->unsigned()->nullable()->default(null);
            $table->integer('updater_id')->unsigned()->nullable()->default(null);
            $table->integer('widget_container_id')->unsigned()->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('page_categories');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('showcase_id')->references('id')->on('showcases');
            $table->foreign('widget_container_id')->references('id')->on('widget_containers');
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
