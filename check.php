<?php
include 'header.php';

try{
    $conn=mysqli_connect($servidor,$usuario,$pass,$db);
    if(!$conn){
        echo '{
            "codigo":400,
            "mensaje":"Error al conectar",
            "respuesta":""
        }';
    }else{
        echo '{
            "codigo":200,
            "mensaje":"Conectado",
            "respuesta":""
        }';
    }

}catch(Exception $e){
    echo '{
        "codigo":400,
        "mensaje":"Error al conectar",
        "respuesta":""
    }';
}