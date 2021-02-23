<?php


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
        echo "Ya rifaste";
        echo '
        <script lang="js">
        var menu=true;
        var eli=confirm("¿Tienes Una cuenta?");
        if(!eli){
            while (menu){
                var nombre=prompt("Registra Tu Nombre");
                var contrasenia=prompt("Registra tu contraseña");
                if(nombre!=null || nombre!="" && contrasenia!=null || contrasenia!=""){
                     window.location.href ="index.php?controller=Usuario&action=VerificarRegistro&nombre=" + nombre + "&contrasenia=" + contrasenia;
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
        echo $_GET["nombre"];
        echo $_GET["contrasenia"];
    }
}