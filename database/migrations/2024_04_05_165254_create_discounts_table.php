<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('code',50);
            $table->enum('discount_type',['amount_off','x_at_set_price','x_at_percentage_off'])->default('x_at_percentage_off');
            $table->string('discount',10);
            $table->enum('discount_time',['permanent','limited_time'])->default('limited_time');
            $table->datetime('discount_start_date')->nullable();
            $table->datetime('discount_end_date')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1-Active, 2-Inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
