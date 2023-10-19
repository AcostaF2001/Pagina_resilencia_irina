<?php
include 'header.php';

try {
    $conn = mysqli_connect($servidor, $usuario, $pass, $db);
    if (!$conn) {
        echo '{
            "codigo":400,
            "mensaje":"Error al conectar",
            "respuesta":""
        }';
    } else {

        if(
        isset($_GET['rol']) && 
        isset($_GET['género']) && 
        isset($_GET['edad']) ){


            $var_rol        = $_GET['rol'];
            $var_genero     = $_GET['género'];
            $var_edad       = $_GET['edad'];

    
            $sql = "INSERT INTO `datos` (`id`, `rol`, `género`, `edad`) VALUES (NULL, '".$var_ro."', '".$var_genero." ', ' ".$var_edad."');";
    
            if ($conn->query($sql) === TRUE) {
                echo '{
                    "codigo":201,
                    "mensaje":"Datos insertados correctamente",
                    "respuesta":""
                }';
            } else {
                echo '{
                    "codigo":401,
                    "mensaje":"Error intentando insertar los datos",
                    "respuesta":""
                }';
            }
        }else{
            echo '{
                "codigo":402,
                "mensaje":"Error datos faltantes para la insercion",
                "respuesta":""
            }';
        }

       
    }
} catch (Exception $e) {
    echo '{
        "codigo":400,
        "mensaje":"Error al conectar",
        "respuesta":""
    }';
}
