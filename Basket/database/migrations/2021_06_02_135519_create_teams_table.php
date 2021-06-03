<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shortname');
            $table->string('city');
            $table->string('country');
            $table->unique(['name', 'city']);
            $table->unsignedBigInteger('league');
            $table->foreign('league')
                ->references('id')
                ->on('leagues')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unique(['name', 'league']);
            $table->boolean('active')->default(false);
            $table->boolean('all_star')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
