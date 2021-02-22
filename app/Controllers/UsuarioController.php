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
                if(){
                     window.location.href = window.location.href + "?w1=" + jsVar1 + "&w2=" + jsVar2;
                }
                menu=false;
            }
        }else{
            
        }
        </script>
        ';
    }
    function registro(){
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