<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("content");
            $table->integer("pres")->nullable();
            $table->bigInteger('wordtype_id')->unsigned();
            $table->foreign('wordtype_id')
                ->references('id')->on('wordtypes');
            $table->unique(array('content', 'wordtype_id'));



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
