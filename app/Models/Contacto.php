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
        $pre->bind_param("ssssssss", $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->telefono, $this->idUsuario);
        $pre->execute();
    }
    function actualizar()
    {
        $pre = mysqli_prepare($this->conexion, "UPDATE contacto SET nombre=?,apellido_paterno=?,apellido_materno=?, telefono=? WHERE id_Contacto=?");
        $pre->bind_param("sss", $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->telefono, $this->idUsuario);
        $pre->execute();
    }
    function eliminar()
    {
        $pre = mysqli_prepare($this->conexion, "DELATE from contacto  WHERE id_Contacto=?");
        $pre->bind_param("s",$this->idContacto);
        $pre->execute();
    }
}