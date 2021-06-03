<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home');
            $table->foreign('home')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('away');
            $table->foreign('away')
                ->references('id')
                ->on('teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('home_score');
            $table->integer('away_score');
            $table->boolean('cancelled')->default(false);
        });

        DB::statement('ALTER TABLE games ADD CONSTRAINT different_teams CHECK (home != away)');
        DB::statement('ALTER TABLE games ADD CONSTRAINT different_scores CHECK (home_score != away_score)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
