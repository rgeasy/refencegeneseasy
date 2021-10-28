<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('species')->unsigned();
            $table->unsignedBigInteger('article')->unsigned();
            $table->string('primer_forward');
            $table->string('primer_reverse');
            $table->string('r2');
            $table->string('e');
            $table->string('accession');
            $table->string('bank');
            $table->timestamps();
        });

        Schema::table('genes', function (Blueprint $table) {
            $table->foreign('species')->references('id')->on('species');
            $table->foreign('article')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genes');
    }
}
