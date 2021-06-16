<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate')->nullable();
            $table->string('origin')->nullable();
            $table->boolean('active')->default(false);
            $table->string('image')->default('null.png');
            $table->boolean('hof')->default(false);
            $table->boolean('dead')->default(false);
            $table->unique(['firstname', 'lastname']);
        });
        DB::statement('ALTER TABLE members ADD CONSTRAINT dead_active CHECK (not (dead and active))');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
