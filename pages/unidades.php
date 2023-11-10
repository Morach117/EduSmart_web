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
                                data-bs-target="#modalAgregarUnidad" id="btnCrear">
                                Agregar Unidad
                            </button>
                        </div>
                        <div class="card-body">
                            <fieldset class="form-fieldset">
                                <div class="col">
                                    <h2 class="page-title">
                                        Unidades Temáticas
                                    </h2>
                                    <h2 class="page-pretitle">
                                        Ingresa el nombre de la unidad temática que deseas modificar
                                    </h2>
                                    <hr class="m-0" />
                                    <div class="table-responsive">
                                        <table id="unidad-table" class="table table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de la materia</th>
                                                    <th>Nombre de la unidad temática</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $selUnidad = $conn->query("SELECT * FROM unidades_tematicas");
                                                if ($selUnidad->rowCount() > 0) {
                                                    while ($selUnidadRow = $selUnidad->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $selUnidadRow['id_materia'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $selUnidadRow['nombre_unidad'] ?>
                                                            </td>
                                                            <td>
                                                                <!-- Agrega los botones de acción según sea necesario -->
                                                                <a href="multimedia.php?id=<?php echo $selUnidadRow['id_unidad']; ?>"
                                                                    class="btn btn-primary">Editar</a>
                                                                <button name="borrar" type="button"
                                                                    data-id="<?php echo $selUnidadRow['id_unidad']; ?>"
                                                                    class="btn btn-danger borrar">Eliminar</button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3'>No hay unidades temáticas registradas.</td></tr>";
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

    <!-- Modal para agregar nueva unidad temática -->
    <div class="modal fade" id="modalAgregarUnidad" tabindex="-1" aria-labelledby="modalAgregarUnidadLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarUnidadLabel">Agregar Nueva Unidad Temática</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar nueva unidad temática -->
                    <form id="form-unidad" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="materia" class="form-label">Nombre de la Materia:</label>
                            <select class="form-select" id="materia" name="materia" required>
                                <?php
                                $query = "SELECT id_materia, nombre_materia FROM materias";
                                $result = $conn->query($query);

                                if ($result !== false) {
                                    $rowCount = $result->rowCount();
                                    echo '<option value="" disabled selected>Seleccionar Materia</option>';

                                    if ($rowCount > 0) {
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                                            echo '<option value="' . $row['id_materia'] . '">' . $row['nombre_materia'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="" disabled>No hay materias disponibles</option>';
                                    }
                                } else {
                                    // Manejar el error en caso de que la consulta falle
                                    echo '<option value="" disabled>Error al obtener las materias</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_unidad" class="form-label">Nombre de la Unidad Temática:</label>
                            <input type="text" class="form-control" id="nombre_unidad" name="nombre_unidad" required>
                        </div>
                        <input type="hidden" name="operacion" id="operacion">
                        <input type="hidden" name="id_unidad" id="id_unidad">
                        <div class="text-center">
                            <input type="submit" name="action" id="action" value="Crear"
                                class="btn btn-primary"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Inicializa DataTable para mejorar la presentación -->
    <script>
    $(document).ready(function () {
        // Crea la variable dataTable al inicializar la tabla
        var dataTable = $('#unidad-table').DataTable();

        $("#btnCrear").click(function () {
            // Actualiza el formulario y la modal-title
            $("#form-unidad")[0].reset();
            $(".modal-title").text("Agregar Nueva Unidad Temática");

            // Actualiza los valores de input hidden y el contenido de imagen_subida
            $("#action").val("Crear");
            $("#operacion").val("Crear");
        });

        $(document).on('submit', '#form-unidad', function (event) {
            event.preventDefault();

            let nombre_materia = $("#materia").val();
            let nombre_unidad = $("#nombre_unidad").val();

            if (nombre_materia !== '' && nombre_unidad !== '') {
                $.ajax({
                    url: "./query/unidad/gestion_unidad.php",
                    method: "POST",
                    data: $(this).serialize() + "&nombre_unidad=" + nombre_unidad,
                    success: function (data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: data
                        });
                        $('#form-unidad')[0].reset();
                        $('#modalAgregarUnidad').modal('hide');
                        
                        // Recarga los datos de la tabla utilizando la variable dataTable
                        location.reload(true);
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
            const id_unidad = $(this).data("id");
            if (confirm("¿Estas seguro de que quieres borrar la unidad?")) {
                $.ajax({
                    url: "./query/unidad/borrar_unidad.php",
                    method: "POST",
                    data: { id_unidad: id_unidad },
                    success: function (data) {
                        alert(data);
                        
                        // Recarga los datos de la tabla utilizando la variable dataTable
                        location.reload(true);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>


</body>

</html>
