<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Win extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wins', function (Blueprint $table) {
            $table->unsignedBigInteger('league');
            $table->unsignedBigInteger('team');
            $table->year('season');
            $table->foreign(['team', 'league'])
                ->references(['team', 'league'])
                ->on('league_team')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wins');
    }
}
