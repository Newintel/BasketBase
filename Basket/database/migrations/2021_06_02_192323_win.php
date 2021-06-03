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
            $table->id();
            $table->unsignedBigInteger('league');
            $table->unsignedBigInteger('team');
            $table->year('season');
            $table->foreign(['team', 'league'])
                ->references(['id', 'league'])
                ->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['league', 'season']);
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
