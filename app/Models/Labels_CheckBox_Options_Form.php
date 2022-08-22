<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labels_CheckBox_Options_Form extends Model
{
    protected $table = "labels_checkbox_options_form";

    protected $fillable = [
        'form_label_setor_id',
        'nome'
    ];
}
