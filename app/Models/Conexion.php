<?php
namespace Models;
class Conexion
{
    public $conexion;
    function __construct(){
        $host="localhost";
        $user="root";
        $pass="";
        $db="agenda_telefonica";
        $this->conexion=mysqli_connect($host,$user,$pass,$db);
        mysqli_query($this->conexion,"SET NAMES 'utf8'");
    }
}