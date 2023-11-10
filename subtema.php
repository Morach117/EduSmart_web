<div class="container my-3 card p-3 col">
    <div class="row">
        <h2 class="page-title col-8">
            Subtemas actuales
        </h2>

        <div class="col-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalContenido">
                Agregar Subtema
            </button>
        </div>
    </div>
    <hr class="m-3" />
    <div class="table-responsive">
        <table id="subtemas-table" class="table table-striped table-hover text-center" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tema</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sel = $conn->query("SELECT * FROM subtemas");
                if ($selTema->rowCount() > 0) {
                    while ($selTemadRow = $selTema->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $selTemadRow['nombre'] ?>
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