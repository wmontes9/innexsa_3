<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Rol;

class RolController extends Controller
{
    /**
     * obtener roles
     * @return \App\Rol
     */
    public function getRoles()
    {
        $nombre = "";
        return Rol::all();
    }
    /**
     * Verificar el rol a cambiar
     * si se encuentra dentro de los roles del 
     * usuario logeado
     * @return mixed  
     */    
    public function verificarRol($user_roles, $rol_cambiar)
    {
        foreach ($user_roles as $rol) {
            if($rol->id_rol == $rol_cambiar){
                return $rol->id_rol;          
            }
        }
        return null;
    }
    /**
     * Verificar Rol usuario 
     * @param Request $request
     */
    public function cambiarRolSesion(Request $request){
        //dd($request);
        return $request->session()
            ->put('rolActual',$this->verificarRol(Auth::user()->roles, $request->rol));    
    }

}
