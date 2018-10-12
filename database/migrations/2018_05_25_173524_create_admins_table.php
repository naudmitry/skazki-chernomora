<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->boolean('super')->default(false);
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->index();
            $table->string('password')->nullable();

            $table->string('ip')->nullable()->index();
            $table->string('last_ip')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
