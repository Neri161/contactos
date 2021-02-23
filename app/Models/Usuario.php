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
        parent::__construct();
    }
    function crear(){
        $pre = mysqli_prepare($this->conexion, "INSERT INTO usuario (nombre,contrasenia) VALUES (?,?)");
        $pre->bind_param("ss", $this->nombre,$this->contrasenia);
        $pre->execute();
    }
    static function verificarRegistro($nombre,$contrasenia){
        $conexion = new Conexion();
        $pre = mysqli_prepare($conexion->conexion, "SELECT * FROM usuario WHERE nombre=? AND contrasenia=?");
        $pre->bind_param("ss", $nombre,$contrasenia);
        $pre->execute();
        $resultado = $pre->get_result();
        return $resultado->fetch_object();
    }
}