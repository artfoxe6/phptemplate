<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_comment', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id")->comment("商品id");
            $table->integer("uid")->comment("评价人");
            $table->string("content")->comment("评价内容");
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table ct_comment comment '商品评价'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_comment');
    }
}
