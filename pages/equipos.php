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
                                data-bs-target="#modal-elegir-alumnos">
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
                                        <table id="equipos-table" class="table table-striped table-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Nombre del equipo</th>
                                                    <th>Integrantes</th>
                                                    <th>Detalles</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $selAlumno = $conn->query("SELECT * FROM alumnos ORDER BY id_alumno");
                                                if ($selAlumno->rowCount() > 0) {
                                                    while ($selAlumnoRow = $selAlumno->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $selAlumnoRow['matricula'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $selAlumnoRow['nombre'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $selAlumnoRow['nombre'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $selAlumnoRow['nombre'] ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "No hay alumnos registrados.";
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

    <!-- Modal para ver detalles de un equipo -->
    <div class="modal modal-blur fade" id="modal-detalles-equipo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles del Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Agrega los detalles del equipo aquí -->
                    <p>Nombre del Equipo: Equipo 1</p>
                    <p>Descripción: Un equipo de desarrollo de software.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para elegir alumnos y añadirlos a un equipo -->
    <div class="modal modal-blur fade" id="modal-elegir-alumnos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elige Alumnos para el Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para crear un nuevo equipo y elegir alumnos -->
                    <form id="equipo-form">
                        <div class="mb-3">
                            <label for="nombre-equipo" class="form-label">Nombre del Equipo:</label>
                            <input type="text" class="form-control" id="nombre-equipo" name="nombre-equipo">
                        </div>
                        <div class="mb-3">
                            <label for="integrantes" class="form-label">Integrantes del Equipo:</label>
                            <input type="text" class="form-control" id="integrantes" name="integrantes">
                        </div>
                        <h4>Alumnos Disponibles</h4>
                        <table id="alumnos-table" class="display">
                            <thead>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>S</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Cuerpo de la tabla de alumnos -->
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#equipos-table').DataTable();

            var dataTable = $('#alumnos-table').DataTable({
                stateSave: true,
                "processing": true,
                "serverSide": true,
                "paging": true,
                "searching": true,
                "ordering": true,
                "order": [],
                "ajax": {
                    url: "./query/equipos/cargar_alumnos.php",
                    type: "POST"
                },
                "columnsDefs": [{
                    "targets": [0, 3, 4],
                    "orderable": false
                }],
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                    "infoFiltered": "(Filtrando de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

            // Captura el evento de envío del formulario
            $('#equipo-form').on('submit', function (e) {
                e.preventDefault();

                // Recopila los checkboxes marcados en un array
                var alumnosSeleccionados = [];
                $('input[name="alumnos_seleccionados[]"]:checked').each(function () {
                    alumnosSeleccionados.push($(this).val());
                });

                // Recopila otros datos del formulario si es necesario
                var nombreEquipo = $('#nombre-equipo').val();
                var integrantesEquipo = $('#integrantes').val();

                // Realiza una solicitud AJAX para guardar los datos
                $.ajax({
                    type: 'POST',
                    url: "./query/equipos/guardar_equipo.php",
                    data: {
                        nombreEquipo: nombreEquipo,
                        integrantesEquipo: integrantesEquipo,
                        alumnosSeleccionados: alumnosSeleccionados
                    },
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Éxito',
                                text: response.message,
                                icon: 'success',
                            }).then(function () {
                                // Realiza acciones adicionales después de guardar el equipo (si es necesario)
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error',
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>

</html>