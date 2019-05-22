<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_id')->index();
            $table->unsignedInteger('buyer_id')->index();
            $table->unsignedInteger('showcase_id')->index();
            $table->timestamp('date_at')->default(Carbon::now());
            $table->unsignedInteger('count_sessions_passed')->index();
            $table->unsignedInteger('count_remaining_sessions')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
}
