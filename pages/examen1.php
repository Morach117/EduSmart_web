<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
</head>

<body>

<div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="container">
                    <div class="card">
                        <div class="text-end pt-3 pe-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal-examen">
                                Administrar equipos
                            </button>
                        </div>
                        <div class="card-body">
                            <fieldset class="form-fieldset">
                                <div class="col">
                                    <h2 class="page-title">
                                        Modulo de selección de equipos
                                    </h2>
                                    <h2 class="page-pretitle">
                                        ingresa el nombre de la unidad temática
                                        que deseas modificar
                                    </h2>
                                    <hr class="m-0" />
                                    <div class="table-responsive">
<table id="examen-table" class="table table-striped table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Nombre de la materia</th>
            <th>Nombre de la unidad</th>
            <th>Tipo de examen</th>
            <th>Fecha</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selExamen = $conn->query("SELECT * FROM examenes");
        if ($selExamen->rowCount() > 0) {
            while ($selExamenRow = $selExamen->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td>
                        <?php echo $selExamenRow['id_materia'] ?>
                    </td>
                    <td>
                        <?php echo $selExamenRow['id_materia'] ?>
                    </td>
                    <!-- Agrega las demás columnas según sea necesario -->
                    <td>
                        <?php echo $selExamenRow['tipo_examen'] ?>
                    </td>
                    <td>
                        <?php echo $selExamenRow['fecha_examen'] ?>
                    </td>
                    <td>
                        <!-- Agrega los botones de acción según sea necesario -->
                        <a class="btn btn-primary" href="examen2.php?id=<?php echo $selExamenRow['id_examen']; ?>">Editar</a>
                        <button name="borrar" type="button"
                        data-id="<?php echo $selExamenRow['id_examen']; ?>"
                        class="btn btn-danger borrar">Eliminar</button>                    
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6'>No hay exámenes registrados.</td></tr>";
        }
        ?>
    </tbody>
</table>


                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal para elegir materia, unidad, tipo de examen, fecha y docente -->
<div class="modal modal-blur fade" id="modal-examen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body">
                    <!-- Formulario para elegir materia, unidad, tipo de examen, fecha y docente -->
                    <form id="form-examen" method="POST" enctype="multipart/form-data">
                        <!-- Campo para elegir la materia -->
                        <div class="mb-3">
    <label for="materia" class="form-label">Materia</label>
    <select class="form-select" id="materia" name="materia" required>
        <?php
        // Consulta para obtener las materias desde la base de datos
        $consultaMaterias = $conn->query("SELECT * FROM materias");

        // Iterar sobre los resultados y construir las opciones del select
        while ($materia = $consultaMaterias->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$materia['id_materia']}'>{$materia['nombre_materia']}</option>";
        }
        ?>
    </select>
</div>

                        <!-- Campo para elegir la unidad -->
                        <div class="mb-3">
    <label for="unidad" class="form-label">Unidad</label>
    <select class="form-select" id="unidad" name="unidad" required>
        <?php
        // Consulta para obtener las unidades desde la base de datos
        $consultaUnidades = $conn->query("SELECT * FROM unidades_tematicas");

        // Iterar sobre los resultados y construir las opciones del select
        while ($unidad = $consultaUnidades->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$unidad['id_unidad']}'>{$unidad['nombre_unidad']}</option>";
        }
        ?>
    </select>
</div>

                        <!-- Campo para elegir el tipo de examen -->
                        <div class="mb-3">
    <label for="tipo_examen" class="form-label">Tipo de Examen</label>
    <select class="form-select" id="tipo_examen" name="tipo_examen" required>
        <option value="Individual">Individual</option>
        <option value="Equipo">Equipo</option>
    </select>
</div>

                        <!-- Campo para elegir la fecha -->
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha del Examen</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>

                        <!-- Campo oculto para el id del docente -->
                        <input type="hidden" name="operacion" id="operacion">
                        <input type="hidden" name="id_unidad" id="id_unidad">
                        <input type="hidden" name="id_docente" value="<?php echo $selDocenteData['id_docente']; ?>">

                        <!-- Botón para enviar el formulario -->
                        <input type="submit" name="action" id="action" value="Crear"
                                class="btn btn-primary"></input>                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>


<script>
        $(document).ready(function () {
            $('#examen-table').DataTable();
        });
    </script>
<script>
    $(document).on('submit', '#form-examen', function (event) {
        event.preventDefault();

        let materia = $("#materia").val();
        let unidad = $("#unidad").val();
        let tipo_examen = $("#tipo_examen").val();
        let fecha = $("#fecha").val();
        let id_docente = $("#id_docente").val();

        if (materia !== '' && unidad !== '' && tipo_examen !== '' && fecha !== '') {
            $.ajax({
                url: "./query/examen/procesar_examen.php",
                method: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data
                    });

                    // Espera un segundo antes de recargar la página
                    setTimeout(function() {
                        $('#form-examen')[0].reset();
                        $('#modal-examen').modal('hide');
                        location.reload(true); // Recargar la página actual
                        // Opción alternativa para redirigir a otra página después de 1 segundo
                        // window.location.href = 'direcciones.php?page=examen1';
                    }, 1000);
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Campos Obligatorios',
                text: 'Algunos campos son obligatorios. Por favor, completa todos los campos requeridos.'
            });
        }
    });

    $(document).on('click', '.borrar', function () {
    const id_examen = $(this).data("id");
    if (confirm("¿Estás seguro de que quieres borrar el examen?")) {
        $.ajax({
            url: "./query/examen/borrar_examen.php",
            method: "POST",
            data: { id_examen: id_examen },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: data
                });
                
                // Espera un segundo antes de recargar la página
                setTimeout(function() {
                    // Recarga los datos de la tabla o redirige a la página de examen1
                    // Puedes elegir una de las siguientes opciones dependiendo de tu necesidad
                    location.reload(true); // Recargar la página actual
                    // window.location.href = 'direcciones.php?page=examen1'; // Redirigir a otra página
                }, 1000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    } else {
        return false;
    }
});


</script>




</html>