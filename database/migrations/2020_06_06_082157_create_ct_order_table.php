<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCtOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_order', function (Blueprint $table) {
            $table->id();
            $table->string("amount")->comment("订单金额");
            $table->integer("product_id")->comment("商品id");
            $table->integer("buy_num")->comment("购买数量");
            $table->integer("uid")->comment("用户id");
            $table->integer("order_type")->default(0)
                ->comment("是否为拼团订单,0单独购买，1拼团订单");
            $table->integer("group_id")->default(0)
                ->comment("团id");
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table ct_order comment '拼团信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_order');
    }
}
