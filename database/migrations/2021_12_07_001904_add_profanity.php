<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfanity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('words', function (Blueprint $table) {
            $table->boolean('profanity')->default(0);
        });

        Schema::table('suggestions', function (Blueprint $table) {
            $table->boolean('profanity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('words', function (Blueprint $table) {
            $table->dropColumn('profanity');
        });

        Schema::table('suggestions', function (Blueprint $table) {
            $table->dropColumn('profanity');
        });
    }
}
