<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamLeagueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_league', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('league');
            $table->foreign('league')
                ->references('id')
                ->on('leagues')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('team');
            $table->foreign('team')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unique(['league', 'team']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_league');
    }
}
