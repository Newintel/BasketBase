<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->set('position', ['G', 'F', 'C']);
            $table->integer('height');
            $table->integer('weight');
            $table->enum('gender', ['M', 'F']);
            $table->unique('member_id');
            $table->year('retired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
