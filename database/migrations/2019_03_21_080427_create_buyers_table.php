<?php

use App\Classes\BuyerRatingEnum;
use App\Classes\BuyerStatusEnum;
use App\Classes\BuyerTypeSubscriptionEnum;
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
            $table->string('passport')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('birthday_at')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('number_contract')->nullable()->index();
            $table->timestamp('contract_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_temporary')->default(false);
            $table->boolean('is_enabled')->default(true);
            $table->integer('stat_orders')->unsigned()->default(0)->index();
            $table->decimal('stat_orders_sum')->default(0)->index();
            $table->string('rating')->default(BuyerRatingEnum::WARNING)->index();
            $table->string('statuses')->default(BuyerStatusEnum::VISITOR)->index();
            $table->integer('showcase_id')->unsigned();
            $table->timestamp('login_at')->nullable();
            $table->string('login_from')->nullable();
            $table->string('created_from')->nullable();
            $table->string('password')->nullable();
            $table->unsignedInteger('organization_id')->nullable();
            $table->string('dynamics')->nullable();
            $table->string('type_subscription')->default(BuyerTypeSubscriptionEnum::FREE);
            $table->unsignedInteger('admin_id')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations');
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
