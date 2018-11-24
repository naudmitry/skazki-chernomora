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
            $table->string('token')->nullable();
            $table->string('password')->nullable();

            $table->timestamp('registered_at')->nullable()->index();
            $table->timestamp('login_at')->nullable()->index();

            $table->string('registered_from')->nullable();
            $table->string('login_from')->nullable();
            $table->string('created_from')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');;
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unique(['email', 'deleted_at']);
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
