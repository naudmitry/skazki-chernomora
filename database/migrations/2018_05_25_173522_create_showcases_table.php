<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowcasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showcases', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug', 40)->unique();
            $table->integer('company_id')->unsigned();
            $table->string('name', 100);
            $table->string('domain', 50)->index();
            $table->string('email', 50)->nullable();
            $table->string('theme', 20)->default('site');
            $table->text('setting')->nullable();
            $table->boolean('enable')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
        });

        \Schema::create('showcase_domains', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->integer('showcase_id')->unsigned()->comment('Showcase ID');
            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');

            $table->string('name', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showcase_domains');
        Schema::dropIfExists('showcases');
    }
}
