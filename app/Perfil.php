<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = "perfil";

    public function user() {
        return $this->belongsToMany('App\User', 'user_perfil', 'user_id', 'perfil_id');
    }
}
