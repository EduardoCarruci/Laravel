<?php

namespace proyecto;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'Accion no autorizada');
    }




    //retornaraca la relacion con los roles

    public function roles(){
        return $this->belongsToMany('proyecto\Role');
        
    }
    // si tiene algun rol de estos recibira un arreglo de roles
    public function hasAnyRole($roles){
        if(is_array($roles)){ // si es un array
            foreach ($roles as $role) {
               if($this->hasRole($role)){   //ERROR ACA PILA TENIAS ERA ROLES
                return true; 
                }
            }
        }else{ // si no es array
            if($this->hasRole($roles)){
                return true; // si es un rol relacionado 
            }
        }
    return false;   
    }

    // si el usuario contiene ese rol (uno)
    public function hasRole($role){
        if($this->roles()->where('name',$role)->first()){
            return true; // si tiene relacion con ese modelo
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
