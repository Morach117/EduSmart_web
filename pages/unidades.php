<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidades</title>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container">
                <div class="card text">
                    <div class="card-body">
                        <fieldset class="form-fieldset my-3">
                            <div class="col">
                                <h2 class="page-title">
                                    Administrar unidades temáticas
                                </h2>
                                <h2 class="page-pretitle">
                                    ingresa el nombre de la unidad temática
                                    que deseas modificar
                                </h2>
                                <hr class="m-0" />
                                <form method="get" id="unidades" class="mt-5">
                                    <div class="row g-3">
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="unidad"
                                                placeholder="Nombre de la unidad" autoFocus />
                                            <label for="folio" class="form-label">Nombre de la unidad</label>
                                        </div>
                                        <div class="col-sm-2 text-start">
                                            <input type="submit" class="btn btn-primary" value="Enviar" />
                                        </div>
                                        <div class="col-sm-5 text-end">
                                            <button type="button" id="btnAgregarUnidad" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#modal-simple">
                                                Agregar nueva unidad
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </fieldset>
                        <hr />
                        <!-- {/* Lista de contenido temático por unidad */} -->
                        <fieldset>
                            <div class="col">
                                <h2 id="tituloUnidad">Nombre de la unidad</h2>
                                <h2 id="tituloGestionSubtemas">Gestión de subtemas</h2>
                                <hr />
                                <div class="container-fluid mt-3">
                                    <form action="" method="post" id="formSubtemas">
                                        <div class="row justify-content-center align-items-center g-2">
                                            <div class="col">
                                                <label htmlFor="" class="form-label">Nuevo subtema</label>
                                                <input type="text" name="nombre_tema" id="tema" class="form-control"
                                                    placeholder="Nombre del nuevo subtema" />
                                            </div>
                                            <div class="col pt-4">
                                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                                <button type="reset" class="btn btn-danger ms-2">Cancelar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr class="mt-3" />
                                <div class="container mt-2">
                                    <h3>Lista de Subtemas</h3>
                                    <table class="table table-striped" id="tablaSubtemas">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre del Subtema</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ejemplo de Subtema 1</td>
                                                <td>
                                                    <a href="direcciones.php?page=multimedia"
                                                        class="btn btn-sm btn-info">Editar</a>
                                                    <button class="btn btn-sm btn-danger ms-2">Eliminar</button>
                                                </td>
                                            </tr>
                                            <!-- Agregar más filas aquí para más subtemas -->
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

    <!-- Modal -->
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear nueva unidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la nueva unidad</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required
                                placeholder="Nombre" />
                        </div>
                        <div class="mb-3">
                            <label for="parcial" class="form-label">Parcial</label>
                            <select class="form-select form-select" name="parcial" id="parcial" required>
                                <option value="">Lista de parciales</option>
                                <option value="">Primer parcial</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="materia" class="form-label">Materia</label>
                            <select class="form-select form-select" name="materia" id="materia" required>
                                <option value="">Lista de materias</option>
                                <option value="">Primer parcial</option>
                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" aria-label="Enviar">
                        Enviar
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>