<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCtProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_product', function (Blueprint $table) {
            $table->id();
            $table->string("amount")->comment("单买价格");
            $table->string("group_amount")->comment("拼团价格");
            $table->integer("sale_num")->default(0)->comment("销量");
            $table->string("title")->comment("商品标题");
            $table->string("banners")->comment("商品banner");
            $table->longText("content")->comment("商品图文详情");
            $table->string("stock_num")->comment("剩余库存");
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table ct_product comment '商品'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_product');
    }
}
