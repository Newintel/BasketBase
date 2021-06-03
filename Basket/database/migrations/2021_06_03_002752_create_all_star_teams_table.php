<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllStarTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_star_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team');
            $table->foreign('team')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('league');
            $table->foreign('league')
                ->references('id')
                ->on('leagues')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('active')->default(false);
            $table->unsignedBigInteger('captain');
            $table->foreign('captain')
                ->references('id')
                ->on('players')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->year('season');
            $table->unique(['team', 'league']);
            $table->unique(['captain', 'season']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_star_teams');
    }
}
