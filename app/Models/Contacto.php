<?php
namespace Models;
require 'app/Models/Conexion.php';
use Models\Conexion;

class Contacto extends Conexion
{
    public $idContacto;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $telefono;
    public $idUsuario;

    function __construct()
    {
        parent::__construct();
    }
    function crear()
    {
        $pre = mysqli_prepare($this->conexion, "INSERT INTO contacto (nombre,apellido_paterno,apellido_materno, telefono,id_Usuario) VALUES(?,?,?,?,?)");
        $pre->bind_param("sssss", $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->telefono, $this->idUsuario);
        $pre->execute();
    }
    static function actualizar($n,$p,$m,$t,$i)
    {
        $conexion = new Conexion();
        $pre = mysqli_prepare($conexion->conexion, "UPDATE contacto SET nombre=?,apellido_paterno=?,apellido_materno=?, telefono=? WHERE id_Contacto=?");
        $pre->bind_param("sssss", $n,$p,$m,$t,$i);
        $pre->execute();
    }
    static function eliminar($id)
    {
        $conexion = new Conexion();
        $pre = mysqli_prepare($conexion->conexion, "DELETE FROM contacto  WHERE id_Contacto=?");
        $pre->bind_param("s",$id);
        $pre->execute();
    }
    static function contactos($id)
    {
        $conexion = new Conexion();
        $pre = mysqli_prepare($conexion->conexion, "SELECT * FROM contacto  WHERE id_Usuario=?");
        $pre->bind_param("s",$id);
        $pre->execute();
        $resultado = $pre->get_result();
        while ($y=mysqli_fetch_assoc($resultado)){
            $t[]=$y;
        }
        return $t;
    }
}