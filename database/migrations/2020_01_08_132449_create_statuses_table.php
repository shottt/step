<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('challenge_id');
            $table->integer('process_id');
            $table->boolean('finish_flg')->default(0);
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascades');
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
