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
                        <form action="procesar.php" method="post">
                            <div class="form-group">
                                <label for="tema">Tema:</label>
                                <input type="text" class="form-control" id="tema" name="tema" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Tema</button>
                        </form>
                    </div>
                </div>

                <!-- Card para agregar subtemas -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Subtema</h5>
                        <form action="procesar.php" method="post">
                            <div class="form-group">
                                <label for="tema_relacionado">Tema Relacionado:</label>
                                <select class="form-control" id="tema_relacionado" name="tema_relacionado" required>
                                    <!-- Aquí cargarías dinámicamente los temas desde la base de datos -->
                                    <option value="1">Tema 1</option>
                                    <option value="2">Tema 2</option>
                                    <!-- ... -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subtema">Subtema:</label>
                                <input type="text" class="form-control" id="subtema" name="subtema" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Subtema</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Columna para agregar contenido relacionado -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar Contenido Relacionado</h5>
                        <form action="procesar.php" method="post">
                            <div class="form-group">
                                <label for="subtema_relacionado">Subtema Relacionado:</label>
                                <select class="form-control" id="subtema_relacionado" name="subtema_relacionado" required>
                                    <!-- Aquí cargarías dinámicamente los subtemas desde la base de datos -->
                                    <option value="1">Subtema 1</option>
                                    <option value="2">Subtema 2</option>
                                    <!-- ... -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contenido">Contenido:</label>
                                <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Contenido</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluye tus scripts si es necesario -->

</body>

</html>
