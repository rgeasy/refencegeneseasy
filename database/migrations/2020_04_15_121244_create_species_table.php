<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('realpath')->nullable();
            $table->integer('tipo')->nullable();
            $table->string('name');
            $table->integer('active')->default(0);
            $table->timestamps();
        });
    }

    /** $table->string('name');
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}