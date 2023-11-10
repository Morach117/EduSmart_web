<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Contenido</title>
</head>

<body>

    <div class="page-wrapper">
        <div class="page-body">
            <div class="cotainer-xl">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <fieldset class="form-fieldset">
                                <div class="col">
                                    <h2 class="page-title">
                                        Modulo para la gestión de temas
                                    </h2>
                                    <h2 class="page-pretitle">
                                    </h2>
                                    <hr class="m-0" />
                                    <div class="row g-2">
                                        <div class="container my-3 card p-3 col">
                                            <div class="row">
                                                <h2 class="page-title col-8">
                                                    Temas actuales
                                                </h2>
                                                <div class="col-4">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalAgregarTema">
                                                        Agregar Tema
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-3" />
                                            <div class="table-responsive">
                                                <table id="temas-table"
                                                    class="table table-striped table-hover text-center"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Tema</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td>1</td>
                                                            <td>Tema 1</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="container my-3 card p-3 col">
                                            <div class="row">
                                                <h2 class="page-title col-8">
                                                    Subtemas actuales
                                                </h2>

                                                <div class="col-4">
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalContenido">
                                                        Agregar Subtema
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-3" />
                                            <div class="table-responsive">
                                                <table id="subtemas-table"
                                                    class="table table-striped table-hover text-center"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Tema</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td>1</td>
                                                            <td>Tema 1</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card container my- card p-3">
                                        <div class="row p-2">
                                            <h2 class="page-title col-6">
                                                Contenidos actuales
                                            </h2>

                                            <div class="col-5 text-end">
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalAgregarSubTema">
                                                    Agregar Subtema
                                                </button>
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                        <hr class="m-1" />
                                        <div class="table-responsive">
                                            <table id="contenido-table"
                                                class="table table-striped table-hover text-center" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Tema</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <td>1</td>
                                                        <td>Tema 1</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Subtema</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalAgregarSubtema">Agregar Subtema</button>
                    </div>
                </div>

                <div class="table-container">
                    <h5>Subtemas Registrados</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tema Relacionado</th>
                                <th>Subtema</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tema 1</td>
                                <td>Subtema 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Contenido Relacionado</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalAgregarContenido">Agregar Contenido</button>
                    </div>
                </div>

                <div class="table-container">
                    <h5>Contenido Relacionado</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subtema Relacionado</th>
                                <th>Contenido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Subtema 1</td>
                                <td>Contenido relacionado 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAgregarTema" tabindex="-1" aria-labelledby="modalAgregarTemaLabel"
        aria-hidden="true">
    </div>

    <div class="modal fade" id="modalAgregarSubtema" tabindex="-1" aria-labelledby="modalAgregarSubtemaLabel"
        aria-hidden="true">
    </div>

    <div class="modal fade" id="modalAgregarContenido" tabindex="-1" aria-labelledby="modalAgregarContenidoLabel"
        aria-hidden="true">
    </div> -->

    <!-- Modal Body-->
    <div class="modal fade " id="modalAgregarTema" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        Add rows here
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="modalAgregarSubTema" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        Add rows here
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="modalContenido" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        Add rows here
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>





    <script>
        $(document).ready(function () {
            $('#temas-table').DataTable();
        });
        $(document).ready(function () {
            $('#subtemas-table').DataTable();
        });
        $(document).ready(function () {
            $('#contenido-table').DataTable();
        });
    </script>
</body>

</html>