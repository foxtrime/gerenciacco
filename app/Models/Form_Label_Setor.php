<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form_Label_Setor extends Model
{
    protected $table = "form_label_setor";

    protected $fillable = [
        "nome",
        "tipo",
        "is_required",
        "nome_setor",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
