<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoHashtagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memo_hashtag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hashtag_id');
            $table->unsignedBigInteger('memo_id');

            $table->unique(['hashtag_id', 'memo_id']);
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
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
        Schema::dropIfExists('memo_hashtag');
    }
}
