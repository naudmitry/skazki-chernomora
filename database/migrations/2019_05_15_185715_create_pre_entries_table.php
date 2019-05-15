<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_entries', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_id')->index();
            $table->unsignedInteger('showcase_id')->index();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->timestamp('desired_date');
            $table->unsignedInteger('salt_cave_id')->index();
            $table->string('type');
            $table->text('message');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('showcase_id')->references('id')->on('showcases');
            $table->foreign('salt_cave_id')->references('id')->on('salt_caves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_entries');
    }
}
