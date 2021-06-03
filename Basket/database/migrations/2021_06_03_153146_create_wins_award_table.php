<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinsAwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wins_award', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player');
            $table->foreign('player')
                ->references('id')
                ->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('league');
            $table->foreign('league')
                ->references('id')
                ->on('leagues')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('award');
            $table->foreign('award')
                ->references('id')
                ->on('awards')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->year('season');
            $table->unique(['league', 'award', 'season']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wins_award');
    }
}
