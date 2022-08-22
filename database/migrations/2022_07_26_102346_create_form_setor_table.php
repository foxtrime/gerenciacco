<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSetorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_setor', function (Blueprint $table) {
            $table->id();

            $table->string('chave');
            $table->string('valor')->nullable();
            $table->string('grupo');
            $table->date('data');

            $table->bigInteger('user_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('form_setor', function($table){
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_setor');
    }
}
