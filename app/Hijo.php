<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Hijo extends Model
{

    //ya que un hijo puede tener muchos padres.
    public function padres(){
        return $this->belongsToMany(Padre::class);

    }
}
