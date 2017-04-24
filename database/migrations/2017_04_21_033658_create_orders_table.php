<?php

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
            $table->string('ord_num')->unique();
            $table->integer('books_id');
            $table->integer('users_id');
            $table->string('price');
            $table->integer('isPay')->default(0);   //0-未支付  1-已支付
            $table->integer('cancel')->default(0);  //0-未取消  1-已取消
            $table->integer('orderWay')->default(0);  //0-金币  1-现金
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
        Schema::dropIfExists('orders');
    }
}
