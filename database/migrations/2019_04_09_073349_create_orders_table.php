<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_id');
            $table->unsignedInteger('showcase_id');
            $table->unsignedInteger('salt_cave_id');

            $table->string('number');
            $table->string('status');
            $table->timestamp('begin_at')->default(Carbon::now());
            $table->timestamp('end_at')->default(Carbon::now());
            $table->unsignedInteger('amount_sessions');
            $table->timestamp('completed_at')->nullable()->default(null);
            $table->decimal('cost', 20, 2);
            $table->decimal('paid', 20, 2);
            $table->decimal('debt', 20, 2);
            $table->string('payment_type');
            $table->string('payment_status');
            $table->unsignedInteger('manager_id')->index();
            $table->unsignedInteger('executant_id')->index();

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
        Schema::dropIfExists('orders');
    }
}
