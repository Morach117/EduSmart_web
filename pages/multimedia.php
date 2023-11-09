<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Contenido</title>
    <!-- Incluye tus estilos personalizados si los tienes -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
        }

        .btn-add {
            margin-top: 20px;
        }

        .table-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Card para agregar temas -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Tema</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarTema">Agregar Tema</button>
                    </div>
                </div>

                <!-- Tabla para mostrar temas -->
                <div class="table-container">
                    <h5>Temas Registrados</h5>
                    <table class="table table-bordered">
                        <!-- Aquí mostrarías dinámicamente los temas desde la base de datos -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tema</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tema 1</td>
                            </tr>
                            <!-- ... -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Columna para agregar subtemas -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Subtema</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarSubtema">Agregar Subtema</button>
                    </div>
                </div>

                <!-- Tabla para mostrar subtemas -->
                <div class="table-container">
                    <h5>Subtemas Registrados</h5>
                    <table class="table table-bordered">
                        <!-- Aquí mostrarías dinámicamente los subtemas desde la base de datos -->
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
                            <!-- ... -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Columna para agregar contenido relacionado -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Contenido Relacionado</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarContenido">Agregar Contenido</button>
                    </div>
                </div>

                <!-- Tabla para mostrar contenido relacionado -->
                <div class="table-container">
                    <h5>Contenido Relacionado</h5>
                    <table class="table table-bordered">
                        <!-- Aquí mostrarías dinámicamente el contenido desde la base de datos -->
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
                            <!-- ... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales para agregar -->
    <!-- Modal para agregar tema -->
    <div class="modal fade" id="modalAgregarTema" tabindex="-1" aria-labelledby="modalAgregarTemaLabel" aria-hidden="true">
        <!-- Contenido del modal -->
    </div>

    <!-- Modal para agregar subtema -->
    <div class="modal fade" id="modalAgregarSubtema" tabindex="-1" aria-labelledby="modalAgregarSubtemaLabel" aria-hidden="true">
        <!-- Contenido del modal -->
    </div>

    <!-- Modal para agregar contenido -->
    <div class="modal fade" id="modalAgregarContenido" tabindex="-1" aria-labelledby="modalAgregarContenidoLabel" aria-hidden="true">
        <!-- Contenido del modal -->
    </div>

    <!-- Incluye tus scripts si es necesario -->

</body>

</html>
