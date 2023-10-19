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

        if(isset($_POST['supervisor']) ){

            $var_supervisor = $_POST['supervisor'];
    
            $sql = "INSERT INTO `supervisor` (`id`, `supervisor`) VALUES (NULL, '".$var_supervisor."');";
    
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
