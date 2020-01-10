<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('step_id');
            $table->boolean('delete_flg')->default(0);
            $table->timestamps();
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascades');
            $table->foreign('step_id')->references('id')->on('steps')->onDelete('cascades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
