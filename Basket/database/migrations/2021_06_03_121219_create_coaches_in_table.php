<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches_in', function (Blueprint $table) {
            $table->unsignedBigInteger('team');
            $table->foreign('team')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('coach');
            $table->foreign('coach')
                ->references('id')
                ->on('coaches')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->year('from_season');
            $table->year('to_season');
            $table->unique(['team', 'coach']);
        });
        DB::statement('ALTER TABLE coaches_in ADD CONSTRAINT coaches_years CHECK (from_season <= to_season)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches_in');
    }
}
