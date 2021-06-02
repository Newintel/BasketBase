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
                $table->year('season');
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
