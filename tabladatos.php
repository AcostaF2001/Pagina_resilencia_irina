<?php

include 'header.php';
//Consulta
$consulta = "SELECT * FROM datos";
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
    <div class="Datos">
        <div class="">

            <a href="index.php">Volver</a>
            <h3 class="titulo">Tabla de Datos</h3>

            <div>
                <label for="busqueda">Buscar:</label>
                <input type="text" id="busqueda" onkeyup="buscarEnTabla()" placeholder="Escribe aquí para buscar...">
            </div>

            <div>
                <label for="filtroEdad">Filtrar por Edad:</label>
                <select id="filtroEdad" onchange="buscarEnTabla()">
                    <option value="">Todos</option>
                    <option value="menor18">Menor de 18</option>
                    <option value="18-30">18-30</option>
                    <option value="31-50">31-50</option>
                    <option value="mayor50">Mayor de 50</option>
                </select>
            </div>

            <div>
                <label for="filtroRol">Filtrar por Rol:</label>
                <select id="filtroRol" onchange="buscarEnTabla()">
                    <option value="">Todos</option>
                    <option value="Docente">Docente</option>
                    <option value="Estudiante">Estudiante</option>
                    <option value="Colaborador">Colaborador</option>
                </select>
            </div>

            <div>
                <label for="filtroGenero">Filtrar por Género:</label>
                <select id="filtroGenero" onchange="buscarEnTabla()">
                    <option value="">Todos</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="" id="tabladatos">
                <table class="table">
                    <thead class="">
                        <th>Id</th>
                        <th>Rol</th>
                        <th>Género</th>
                        <th>Edad</th>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = $guardar->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['rol']; ?></td>
                                <td><?php echo $row['género']; ?></td>
                                <td><?php echo $row['edad']; ?></td>
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
        var filtroEdad = document.getElementById('filtroEdad').value;
        var filtroRol = document.getElementById('filtroRol').value;
        var filtroGenero = document.getElementById('filtroGenero').value;
        var filter = input.value.toUpperCase();
        var table = document.getElementById('tabladatos');
        var tr = table.getElementsByTagName('tr');

        for (var i = 0; i < tr.length; i++) {
            var mostrarFila = false;

            if (i === 0) {
                mostrarFila = true;
            } else {
                var td = tr[i].getElementsByTagName('td');
                var edad = td[3].innerHTML; // Columna de edad (cambia el índice si es diferente)
                var rol = td[1].innerHTML; // Columna de rol (cambia el índice si es diferente)
                var genero = td[2].innerHTML; // Columna de género (cambia el índice si es diferente)

                if ((filtroEdad === '' || filtroEdad === 'Todos' || (filtroEdad === 'menor18' && edad < 18) || (filtroEdad === '18-30' && edad >= 18 && edad <= 30) || (filtroEdad === '31-50' && edad > 30 && edad <= 50) || (filtroEdad === 'mayor50' && edad > 50)) &&
                    (filtroRol === '' || filtroRol === 'Todos' || filtroRol === rol) &&
                    (filtroGenero === '' || filtroGenero === 'Todos' || filtroGenero === genero)) {
                    if (filter === '' || (rol.toUpperCase().indexOf(filter) > -1)) {
                        mostrarFila = true;
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