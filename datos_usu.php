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

        if(isset($_GET['supervisor']) && 
        isset($_GET['rol']) && 
        isset($_GET['género']) && 
        isset($_GET['edad']) && 
        isset($_GET['tiempo'])){

            $var_supervisor = $_GET['supervisor'];
            $var_rol        = $_GET['rol'];
            $var_genero     = $_GET['género'];
            $var_edad       = $_GET['edad'];
            $var_tiempo     = $_GET['tiempo'];
    
            $sql = "INSERT INTO `usuarios` (`id`, `supervisor`, `rol`, `género`, `edad`, `tiempo`)
            VALUES (NULL, '" . $var_supervisor . "', '" . $var_rol . "', '" . $var_genero . "', '" . $var_edad . "', '" . $var_tiempo . "');";
    
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
