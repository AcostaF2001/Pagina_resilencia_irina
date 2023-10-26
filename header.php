<?php
$servidor="localhost";
$db="resilencia_de_irina";
$usuario="root";
$pass="";
$conecta= mysqli_connect($servidor,$usuario,$pass,$db);

if($conecta->connect_error){
    die("Error al conectar la base de datos".$conecta->connect_error);
}

?>


