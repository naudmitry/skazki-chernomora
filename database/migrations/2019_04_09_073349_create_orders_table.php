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

            $table->unsignedInteger('company_id')->index();
            $table->unsignedInteger('showcase_id')->index();
            $table->unsignedInteger('salt_cave_id')->index();
            $table->unsignedInteger('buyer_id')->index();
            $table->unsignedInteger('parent_id')->nullable()->index();

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
            $table->string('reason_cancellation')->nullable();
            $table->unsignedInteger('count_free_sessions')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('showcase_id')->references('id')->on('showcases');
            $table->foreign('salt_cave_id')->references('id')->on('salt_caves');
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('parent_id')->references('id')->on('orders');
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
