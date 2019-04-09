<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_id')->index();
            $table->unsignedInteger('showcase_id')->index();
            $table->timestamp('date_begin')->default(Carbon::now());
            $table->timestamp('date_end')->default(Carbon::now());
            $table->string('type');
            $table->unsignedInteger('amount_sessions');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
