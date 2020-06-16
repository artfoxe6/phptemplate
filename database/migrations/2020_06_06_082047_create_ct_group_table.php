<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCtGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_group', function (Blueprint $table) {
            $table->id();
            $table->integer("need_num")->comment("拼团需要的用户数量");
            $table->integer("head_uid")->comment("团长");
            $table->integer("end_at")->comment("团结束时间");
            $table->integer("status")->comment("1拼团中，2拼团成功，3拼团失败");
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("alter table ct_group comment '拼团信息'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ct_group');
    }
}
