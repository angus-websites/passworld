<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrammarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grammars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        //Create the grammar_wordtype table
        Schema::create('grammar_wordtype', function (Blueprint $table) {
            $table->bigInteger('grammar_id')->unsigned();
            $table->bigInteger('wordtype_id')->unsigned();
            $table->foreign('grammar_id')
                ->references('id')->on('grammars');
            $table->foreign('wordtype_id')
                ->references('id')->on('wordtypes');

            $table->integer('order');
            $table->unique(array('grammar_id', 'order'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grammars');
    }
}
