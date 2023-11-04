<?php
include("../../conn.php"); // Asegúrate de que la ruta sea la correcta

if (isset($_POST["id_materia"])) {
    $salida = array();

    // Definir una consulta preparada usando PDO
    $query = "SELECT * FROM materias WHERE id_materia = :id_materia LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_materia', $_POST["id_materia"], PDO::PARAM_INT);
    $stmt->execute();

    // Obtener los resultados utilizando fetch
    if ($stmt->rowCount() > 0) {
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        $salida["nombre_materia"] = $fila["nombre_materia"];

        // Disponer de la posibilidad de editar la imagen que se tiene en la materia.
        if (!empty($fila["img"])) {
            $salida["img"] = '<img src="././multimedia/' . $fila["img"] . '" class="img-thumbnail" width="100" height="50" />';
        } else {
            $salida["img"] = '<input type="hidden" name="imagen_materia_oculta" value="' . $fila["img"] . '" />';
        }

        // Exportar datos en formato JSON - String
        echo json_encode($salida, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
?>
