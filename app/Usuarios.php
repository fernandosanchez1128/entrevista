<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Usuarios extends Model  {

    protected $table = 'usuarios';
    // declaramos la tabla que usa el modelo
    protected $fillable = array('id','nombre', 'apellido', 'cedula','correo', 'telefono');
    // declaramos los campos con los que se puede crear el objeto desde el form

}
