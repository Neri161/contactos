<?php
namespace Models;
require 'app/Models/Conexion.php';
use Models\Conexion;

class Usuario extends Conexion
{
    public $nombre;
    public $contrasenia;
    public function __construct()
    {

    }

    function crear(){

    }

}