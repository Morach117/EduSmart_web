<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <!-- Asegúrate de incluir las librerías necesarias, como Bootstrap y DataTables -->
    <!-- Asegúrate de incluir las librerías necesarias, como Bootstrap y DataTables -->
</head>

<body>

    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="container">
                    <div class="card">
                        <div class="text-end pt-3 pe-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalAgregarUnidad">
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
                                                                <a href="editar_unidad.php?id=<?php echo $selUnidadRow['id_unidad']; ?>" class="btn btn-primary">Editar</a>
                                                                <button class="btn btn-danger">Eliminar</button>
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
    <div class="modal fade" id="modalAgregarUnidad" tabindex="-1" aria-labelledby="modalAgregarUnidadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarUnidadLabel">Agregar Nueva Unidad Temática</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar nueva unidad temática -->
                    <form action="procesar.php" method="post">
                        <div class="mb-3">
                            <label for="materia" class="form-label">Nombre de la Materia:</label>
                            <input type="text" class="form-control" id="materia" name="materia" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_unidad" class="form-label">Nombre de la Unidad Temática:</label>
                            <input type="text" class="form-control" id="nombre_unidad" name="nombre_unidad" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Inicializa DataTable para mejorar la presentación -->
    <script>
        $(document).ready(function () {
            $('#unidad-table').DataTable();
        });
    </script>

</body>

</html>
