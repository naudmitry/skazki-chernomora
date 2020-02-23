<?php

use App\Classes\ReviewStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_id')->index();
            $table->unsignedInteger('showcase_id')->index();
            $table->unsignedInteger('buyer_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('status')->nullable()->default(ReviewStatusEnum::NEW)->index();
            $table->unsignedInteger('rating')->nullable()->index();
            $table->text('review')->nullable();
            $table->boolean('is_widget')->default(false);
            $table->text('reply')->nullable();
            $table->string('customer_name')->nullable()->index();
            $table->string('customer_position')->nullable();
            $table->string('avatar_link')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('showcase_id')->references('id')->on('showcases')->onDelete('cascade');
            $table->foreign('buyer_id')->references('id')->on('buyers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
