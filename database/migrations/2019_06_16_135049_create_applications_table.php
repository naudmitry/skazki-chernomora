<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('city');
            $table->boolean('is_process_personal_data')->default(false);
            $table->unsignedInteger('application_type_id')->index();

            $table->timestamps();

            $table->foreign('application_type_id')->references('id')->on('application_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
