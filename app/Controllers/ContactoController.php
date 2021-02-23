<?php
require 'app/Models/Contacto.php';
use Models\Contacto;

class ContactoController
{
        function menu(){
            echo '
            <script lang="js">
                var nombre=prompt("------------MENU------------"+"\n"+
                                   "1.- Agregar Contacto"+"\n"+
                                   "2.- Eliminar Contacto"+"\n"+
                                   "3.- Actualizar Contactos"+"\n"+
                                   "4.- Cerrar Sesion"+"\n");
                switch (nombre){
                    case "1":
                        window.location.href ="index.php?controller=Contacto&action=registrarContacto";
                        break;
                    case "2":
                        window.location.href ="index.php?controller=Contacto&action=contactos&id=";
                        break;
                    case "3":
                        window.location.href ="index.php?controller=Contacto&action=contactosA&id=";
                        break;
                    case "4":
                        window.location.href ="index.php?controller=Contacto&action=logout";
                        break;
                    default:
                        window.location.href ="index.php?controller=Contacto&action=menu";
                        break;
                }
            </script>
            ';
        }
        function registrarContacto()
        {
            echo '
            <script lang="js">
                    var nombre=prompt("Ingresa el Nombre del Contacto");
                    var apellido_paterno=prompt("Ingresa el Apellido Paterno del Contacto");
                    var apellido_materno=prompt("Ingresa el Apellido Materno del Contacto");
                    var telefono=prompt("Ingresa el Telefono del Contacto");
                    window.location.href ="index.php?controller=Contacto&action=VerificarRegistroContacto&nombre="+nombre+"&paterno="+apellido_paterno+"&materno="+apellido_materno+"&telefono="+telefono;
            </script>
                    ';
        }
        function VerificarRegistroContacto(){
            $contacto=new Contacto();
            session_start();
            $id=$_SESSION["idUsuario"];
            $contacto->nombre=$_GET["nombre"];
            $contacto->apellidoPaterno=$_GET["paterno"];
            $contacto->apellidoMaterno=$_GET["materno"];
            $contacto->telefono=$_GET["telefono"];
            $contacto->idUsuario=$id;
            $contacto->crear();
            header("location:../../../contactos/index.php?controller=Contacto&action=menu");
        }

        function contactosA(){

        if ($_GET["id"]!= null || $_GET["id"]!="") {
            $id=$_GET["id"];
            header("location:../../../contactos/index.php?controller=Contacto&action=actualizarContacto");
        }
        session_start();
        $contactos=Contacto::contactos($_SESSION["idUsuario"]);
        echo "<table border='2'><thead><tr>";
        echo "<th>#</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido Paterno</th>";
        echo "<th>Apellido Materno</th>";
        echo "<th>Telefono</th>";
        echo "</tr></thead><tbody>";

        foreach ($contactos as $valor) {
            echo "<tr>";
            echo "<th>".$valor['id_Contacto']."</th>";
            echo "<th>".$valor['nombre']."</th>";
            echo "<th>".$valor['apellido_paterno']."</th>";
            echo "<th>".$valor['apellido_materno']."</th>";
            echo "<th>".$valor['telefono']."</th>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }
        function actualizarContacto()
        {
            echo '
            <script lang="js">
                    var id=prompt("Ingresa el id del contacto");
                    var nombre=prompt("Ingresa el Nombre del Contacto");
                    var apellido_paterno=prompt("Ingresa el Apellido Paterno del Contacto");
                    var apellido_materno=prompt("Ingresa el Apellido Materno del Contacto");
                    var telefono=prompt("Ingresa el Telefono del Contacto");
                    window.location.href ="index.php?controller=Contacto&action=actualizarC&id="+id+"&nombre="+nombre+"&paterno="+apellido_paterno+"&materno="+apellido_materno+"&telefono="+telefono;            
                    </script>
                    ';
        }
        function actualizarC(){
            $contacto=new Contacto();
            session_start();
            $i=$_GET["id"];
            $n=$_GET["nombre"];
            $p=$_GET["paterno"];
            $m=$_GET["materno"];
            $t=$_GET["telefono"];
            $actualizar=Contacto::actualizar($n,$p,$m,$t,$i);
            header("location:../../../contactos/index.php?controller=Contacto&action=menu");
        }
        function contactos(){

            if ($_GET["id"]!= null || $_GET["id"]!="") {
                $id=$_GET["id"];
                header("location:../../../contactos/index.php?controller=Contacto&action=eliminarContacto&id=$id");
            }
            session_start();
            $contactos=Contacto::contactos($_SESSION["idUsuario"]);
            echo "<table border='2'><thead><tr>";
            echo "<th>#</th>";
            echo "<th>Nombre</th>";
            echo "<th>Apellido Paterno</th>";
            echo "<th>Apellido Materno</th>";
            echo "<th>Telefono</th>";
            echo "</tr></thead><tbody>";

            foreach ($contactos as $valor) {
                echo "<tr>";
                echo "<th>".$valor['id_Contacto']."</th>";
                echo "<th>".$valor['nombre']."</th>";
                echo "<th>".$valor['apellido_paterno']."</th>";
                echo "<th>".$valor['apellido_materno']."</th>";
                echo "<th>".$valor['telefono']."</th>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
        function eliminarContacto()
        {
            $eli=Contacto::eliminar($_GET["id"]);
            header("location:../../../contactos/index.php?controller=Contacto&action=menu");
        }

        function logout(){
            session_start();
            session_destroy();
            header("location:../../../contactos/index.php?controller=Usuario&action=login");
        }

}