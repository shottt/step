<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('step_id');
            $table->boolean('finish_flg')->default(0);
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascades');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
