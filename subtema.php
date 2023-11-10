<?php
session_start(); // inicia la sesion

if (!isset($_SESSION['admin']['adminnakalogin']) == true) {
    header("location:index.php"); // si el usuario no inicio sesion, lo redirige a la pagina de login
}

include('conn.php'); // Incluir archivo de conexión a la base de datos
include('includes/navbar.php'); // Incluir archivo de barra de navegación

$id = isset($_GET['id']) ? $_GET['id'] : null;

?>
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
                                                            <th scope="col">Subtema</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $selTema = $conn->query("SELECT * FROM subtemas WHERE id_subtema = $id");
                                                        if ($selTema->rowCount() > 0) {
                                                            while ($selTemadRow = $selTema->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $selTemadRow['nombre'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="subtema.php?id=<?php echo $selTemadRow['id_tema    '] ?>"
                                                                            class="btn btn-primary">Agregar subtema</a>

                                                                        <a href="contenido.php?id=<?php echo $selTemadRow['id_tema'] ?>"
                                                                            class="btn btn-primary">Agregar contenido</a>

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='3'>No hay temas registrados.</td></tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
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