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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-equipos">
                            Agregar equipos
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-center card-table">
                            <thead>
                                <tr>
                                    <th>Examen</th>
                                    <th>Unidad</th>
                                    <th>Equipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Paweł Kuna</td>
                                    <td class="text-muted">
                                        UI Designer, Training
                                    </td>
                                    <td class="text-muted"><a href="direcciones.php?page=examen2"
                                            class="btn btn-secondary p-1">Agregar preguntas</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

</html>