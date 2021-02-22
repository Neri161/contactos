<?php


class UsuarioController
{
    function login(){
        echo '
        <script lang="js">
        var menu=true;
        var eli=confirm("Tienes Una cuenta");
        if(eli==true){
            while (menu){
                var nombre=prompt("Ingresa Tu Nombre");
                var contrasenia=prompt("Ingresa tu contraseña");
                if(nombre!=null || nombre!="" && contrasenia!=null || contrasenia!=""){
                     window.location.href ="index.php?controller=Usuario&action=VerificarCredenciales&nombre=" + nombre + "&contrasenia=" + contrasenia;
                }
                menu=false;
            }
        }else{
            
        }
        </script>
        ';
    }
    function registro(){
        echo "Ya rifaste";
       echo '
        <script lang="js">
        var menu=true;
            while (menu){
                var nombre=prompt("Ingresa Tu Nombre");
                var contrasenia=prompt("Ingresa tu contraseña");
                alert(nombre+" "+contrasenia);
                menu=false;
            }
        </script>
        ';
    }
    function contactos(){

    }
}