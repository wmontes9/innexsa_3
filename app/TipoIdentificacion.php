<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIdentificacion extends Model
{
    protected $table = "tipos_identificacion";

    public $timestamps = false;

    public function usuario()
    {
        return $this->hasMany(User::class);
    }
}
