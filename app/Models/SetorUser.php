<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetorUser extends Model
{
    protected $table = "user_setor";
				
    protected $fillable = [
    'nome_setor',
    'user_id'
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
