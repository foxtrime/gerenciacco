<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormLabelSetorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_label_setor', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->string('tipo');
            $table->boolean('is_required')           ->default(false);
            $table->string('nome_setor');
            
            $table->bigInteger('user_id')->unsigned();


            $table->timestamps();
        });

        Schema::table('form_label_setor', function($table){
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
        Schema::dropIfExists('form_label_setor');
    }
}
