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
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
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

    <div class="modal modal-blur fade" id="modal-equipos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>Equipo</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Paweł Kuna</td>
                                        <td class="text-muted">eliminar
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

</html>