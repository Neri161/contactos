<?php
require 'app/Models/Usuario.php';
use Models\Usuario;

class UsuarioController
{
    function login(){
        echo '
        <script lang="js">
        var menu=true;
        var eli=confirm("¿Tienes Una cuenta?");
        if(eli){
            while (menu){
                var nombre=prompt("Ingresa Tu Nombre");
                var contrasenia=prompt("Ingresa tu contraseña");
                if(nombre!=null || nombre!="" && contrasenia!=null || contrasenia!=""){
                     window.location.href ="index.php?controller=Usuario&action=VerificarCredenciales&nombre=" + nombre + "&contrasenia=" + contrasenia;
                }
                menu=false;
            }
        }else{
            window.location.href ="index.php?controller=Usuario&action=registro";
        }
        </script>
        ';
    }
    function registro(){
        if(isset($_GET["error"])){
            echo '
            <script lang="js">
                alert("El usuario ya esta registrado");
            </script>
            ';
        }
        echo '
        <script lang="js">
        var menu=true;
        var eli=confirm("¿Tienes Una cuenta?");
        if(!eli){
            while (menu){
                var nombre=prompt("Registra Tu Nombre");
                var contrasenia=prompt("Registra tu contraseña");
                if(nombre!=null || nombre!="" && contrasenia!=null || contrasenia!=""){
                     window.location.href ="index.php?controller=Usuario&action=verificarRegistro&nombre=" + nombre + "&contrasenia=" + contrasenia;
                }
                menu=false;
            }
        }else{
            window.location.href ="index.php?controller=Usuario&action=login";
        }
        </script>
        ';
    }
    function VerificarRegistro(){
        $nombre= $_GET["nombre"];
        $contrasenia= $_GET["contrasenia"];
        $verificar=Usuario::verificarRegistro($nombre,$contrasenia);
        if ($verificar==null){
            $usuario=new Usuario();
            $usuario->nombre=$nombre;
            $usuario->contrasenia=$contrasenia;
            $usuario->crear();
            header("location:../../../contactos/index.php?controller=Usuario&action=login");
        }else{
            header("location:../../../contactos/index.php?controller=Usuario&action=registro&error");
        }
    }
    function verificarCredenciales(){
        $nombre= $_GET["nombre"];
        $contrasenia= $_GET["contrasenia"];
        $verificar=Usuario::verificarRegistro($nombre,$contrasenia);
        if ($verificar){
            session_start();
            $_SESSION["idUsuario"]=$verificar->id_Usuario;
            echo $_SESSION["idUsuario"];
            header("location:../../../contactos/index.php?controller=Contacto&action=menu");
        }else{
            header("location:../../../contactos/index.php?controller=Usuario&action=login");
        }
    }
}