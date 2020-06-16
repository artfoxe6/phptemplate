<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCtUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_user', function (Blueprint $table) {
            $table->id();
            $table->string("phone")->default("")->comment("微信id");
            $table->string("openid")->comment("微信openid");
            $table->string("avatar")->comment("头像");
            $table->string("name")->comment("昵称");
            $table->string("address")->comment("收获地址");
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table ct_user comment '用户'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_user');
    }
}
