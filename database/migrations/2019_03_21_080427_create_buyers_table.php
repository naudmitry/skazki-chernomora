<?php

use App\Classes\BuyerRatingEnum;
use App\Classes\BuyerStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('number_contract')->nullable()->index();
            $table->timestamp('contract_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_temporary')->default(false)->comment('Flag for autocreated user');
            $table->boolean('is_enabled')->default(true)->comment('Flag for enabling/disabling user');
            $table->integer('stat_orders')->unsigned()->default(0)->index();
            $table->decimal('stat_orders_sum')->default(0)->index();
            $table->string('rating')->default(BuyerRatingEnum::WARNING)->index();
            $table->string('statuses')->default(BuyerStatusEnum::VISITOR)->index();
            $table->integer('showcase_id')->unsigned();
            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');
            $table->timestamp('login_at')->nullable();
            $table->string('login_from')->nullable();
            $table->string('created_from')->nullable();
            $table->string('password')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('buyers');
    }
}
