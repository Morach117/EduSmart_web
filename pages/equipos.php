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
                <div class="card">
                    <div class="text-end p-5">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-elegir-alumnos">
                            Administrar equipos
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="equipos-table" class="table table-center card-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nombre del equipo</th>
                                    <th>Integrantes</th>
                                    <th>Detalles</th>
                                </tr>
                            </thead>





                            <!-- <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Equipo 1</td>
                                    <td>John Doe, Jane Smith</td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-detalles-equipo">Ver Detalles</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Equipo 2</td>
                                    <td>Mary Johnson, James Brown</td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-detalles-equipo">Ver Detalles</button></td>
                                </tr>
                            </tbody> -->
                        </table>
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
                                <th>Nombre</th>
                                <th>Matrícula</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function () {
            $('#alumnos-table').DataTable();
            $('#equipos-table').DataTable();

            $.ajax({
            type: 'GET',
            url: './query/equipos/cargar_alumnos.php', // Nombre del archivo PHP para obtener los datos de los alumnos
            success: function (response) {
                console.log(response);
                var alumnos = JSON.parse(response);

                var tbody = $('#alumnos-table tbody');

                // Recorre la lista de alumnos y agrega filas a la tabla
                alumnos.forEach(function (alumno) {
                    var row = `
                        <tr>
                            <td>${alumno.nombre}</td>
                            <td>${alumno.matricula}</td>
                            <td><input type="checkbox" name="alumnos_seleccionados[]" value="${alumno.id}"></td>
                        </tr>
                    `;
                    tbody.append(row);
                });
            }
        });

        });
    </script>
</body>

</html>
