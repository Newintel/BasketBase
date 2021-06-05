<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaysInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plays_in', function (Blueprint $table) {
            $table->unsignedBigInteger('team');
            $table->foreign('team')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('player');
            $table->foreign('player')
                ->references('id')
                ->on('players')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->year('from_season');
            $table->year('to_season')->nullable();
            $table->set('transfer', ['start', 'end'])->default('');
            $table->unique(['team', 'player']);
        });
        DB::statement('ALTER TABLE plays_in ADD CONSTRAINT players_years CHECK (to_season = null or from_season <= to_season)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plays_in');
    }
}
