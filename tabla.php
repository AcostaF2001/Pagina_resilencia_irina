<?php

include 'header.php';
//Consulta
$consulta = "SELECT * FROM supervisor";
$guardar = $conecta->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resilencia de Irina</title>
</head>

<body>
    <div class="supervisor">

        <a href="index.php">Volver</a>
        <div class="">
            <h3 class="titulo">Tabla de Supervisores</h3>
            <div>
                <label for="busqueda">Buscar:</label>
                <input type="text" id="busqueda" onkeyup="buscarEnTabla()" placeholder="Escribe aquí para buscar...">
            </div>
            <div class="" id="tablaSupervisor">
                <table class="table">
                    <thead class="">
                        <th>Id</th>
                        <th>Supervisor</th>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = $guardar->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['supervisor']; ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>

        </div>

    </div>


</body>

</html>

<script>
    function buscarEnTabla() {
        var input = document.getElementById('busqueda');
        var filter = input.value.toUpperCase();
        var table = document.getElementById('tablaSupervisor');
        var tr = table.getElementsByTagName('tr');

        for (var i = 0; i < tr.length; i++) {
            var mostrarFila = false;

            // Ignorar la primera fila (encabezados de la tabla)
            if (i === 0) {
                mostrarFila = true;
            } else {
                var td = tr[i].getElementsByTagName('td');
                for (var j = 0; j < td.length; j++) {
                    var cell = td[j];
                    if (cell) {
                        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            mostrarFila = true;
                            break;
                        }
                    }
                }
            }

            if (mostrarFila) {
                tr[i].style.display = '';
            } else {
                tr[i].style.display = 'none';
            }
        }
    }
</script>