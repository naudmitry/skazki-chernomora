<?php

use App\Classes\ReviewStatusEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->integer('company_id')->unsigned()->index();
            $table->integer('showcase_id')->unsigned()->index();
            $table->integer('buyer_id')->unsigned()->index();
            $table->string('ip')->nullable();
            $table->string('status')->nullable()->default(ReviewStatusEnum::NEW)->index();
            $table->integer('rating')->unsigned()->nullable()->index();
            $table->text('description')->nullable();
            $table->boolean('show_in_widgets')->default(0);
            $table->text('reply')->nullable();

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
