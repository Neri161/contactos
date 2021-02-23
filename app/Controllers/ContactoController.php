<?php


class ContactoController
{
    function registrarContacto(){
        echo '
        <script lang="js">
        var menu=true;
        var eli=confirm("Tienes Una cuenta");
        if(eli){
            while (menu){
                
                var nombre=prompt("Ingresa el Nombre del Contacto");
                var apellido_paterno=prompt("Ingresa el Apellido Paterno del Contacto");
                var apellido_materno=prompt("Ingresa el Apellido Materno del Contacto");
                var telefono=prompt("Ingresa el Telefono del Contacto");
                var menu=true;
            }
                </script>
                ';
            }


            function actualizarContacto(){
                echo '
                <script lang="js">
                var menu=true;
                var eli=confirm("Tienes Una cuenta");
                if(eli){
                    while (menu){
                        
                        var nombre=prompt("Ingresa el Nombre del Contacto");
                        var apellido_paterno=prompt("Ingresa el Apellido Paterno del Contacto");
                        var apellido_materno=prompt("Ingresa el Apellido Materno del Contacto");
                        var telefono=prompt("Ingresa el Telefono del Contacto");
                        var menu=true;
                        
                        </script>
                        ';
        
            }

        function eliminarContacto(){
            echo '
            <script lang="js">
            var menu=true;
            var eli=confirm("Tienes Una cuenta");
            if(eli){
                while (menu){
                    
                    var id=prompt("Ingresa el ID del Contacto que quiere eliminar");
                
                    var menu=true;
                    
                    </script>
                    ';
                }