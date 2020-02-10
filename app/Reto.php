<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reto extends Model
{
    protected $table = "retos";

    protected $primaryKey = 'id_reto';

    protected $fillable = ["enunciado","descripcion","url_imagen","estado"];

   
    public function detalle_reto()
    {
    	return $this->hasMany("App\Detalle_Reto");
    }
    public function equipos()
    {
        return $this->hasMany("App\Equipo");
    }
    public function sectores()
    {
        return $this->hasMany("App\Reto_Sector_Economico");
    }
     public function Calificacion()
    {
        return $this->hasMany("App\Calificacion");
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'reto_usuarios', 'id_reto', 'id_usuario');
    }
    
}
