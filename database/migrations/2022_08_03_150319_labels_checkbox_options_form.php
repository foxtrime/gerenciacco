<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LabelsCheckboxOptionsForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels_checkbox_options_form', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('form_label_setor_id')->unsigned();
            $table->string('nome');

            $table->timestamps();
        });

        Schema::table('labels_checkbox_options_form', function($table){
            $table->foreign('form_label_setor_id')->references('id')->on('form_label_setor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
