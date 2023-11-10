<?php

session_start(); // inicia la sesion

if (!isset($_SESSION['admin']['adminnakalogin']) == true) {
    header("location:index.php"); // si el usuario no inicio sesion, lo redirige a la pagina de login
}

include('conn.php'); // Incluir archivo de conexión a la base de datos
include('includes/navbar.php'); // Incluir archivo de barra de navegación


// Obtener el ID del examen de la URL
$id_examen = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se proporcionó un ID de examen
if ($id_examen) {
    // Consultar la base de datos para obtener los detalles del examen
    // (Asumiendo que tienes una conexión a la base de datos llamada $conn)
    $stmt = $conn->prepare("SELECT * FROM examenes WHERE id_examen = :id_examen");
    $stmt->bindParam(':id_examen', $id_examen, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtener los datos del examen
    $examen = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontraron datos
    if ($examen) {
        // Mostrar los detalles del examen en los campos del formulario
        $titulo = $examen['titulo'];
        $pregunta1 = $examen['pregunta1'];
        $pregunta2 = $examen['pregunta2'];
        $pregunta3 = $examen['pregunta3'];
    } else {
        // No se encontró el examen con el ID proporcionado
        echo "Examen no encontrado";
        exit;
    }
} else {
    // No se proporcionó un ID de examen
    echo "ID de examen no proporcionado";
    exit;
}
?>

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
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-4">
                        <div class="card">
                            <form action="" method="post">
                                <fieldset class="form-fieldset m-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="formId1" id="formId1"
                                            placeholder="" value="<?php echo $titulo; ?>">
                                        <label for="formId1">Titulo</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="formId1" id="formId1"
                                            placeholder="">
                                        <label for="formId1">Titulo</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="formId1" id="formId1"
                                            placeholder="">
                                        <label for="formId1">Titulo</label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-7">
                        <div class="card">
                            <form action="" method="post">
                                <fieldset class="form-fieldset m-3">
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-primary">Agregar</button>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea"><?php echo $pregunta1; ?></textarea>
                                            <label for="floatingTextarea">Pregunta 1</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea"><?php echo $pregunta2; ?></textarea>
                                            <label for="floatingTextarea">Pregunta 2</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea"><?php echo $pregunta3; ?></textarea>
                                            <label for="floatingTextarea">Pregunta 3</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
