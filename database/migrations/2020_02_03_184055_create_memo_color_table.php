<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo_color', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('memo_id');
            
            $table->unique(['color_id', 'memo_id']);
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('memo_id')->references('id')->on('memos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memo_color');
    }
}
