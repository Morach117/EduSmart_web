<?php
include "../../conn.php";

if (isset($_POST["id_materia"])) {
    // Además de la información, eliminamos la imagen de la materia en la carpeta "multimedia/" con PHP
    $imagen = obtener_nombre_imagen($_POST["id_materia"]);
    if ($imagen != "") {
        // Eliminar archivo de imagen en la carpeta "multimedia/" con comando PHP
        unlink("../../multimedia/" . $imagen);
    }

    // Preparar la consulta para eliminar la materia de la tabla "materias"
    $stmt = $conn->prepare("DELETE FROM materias WHERE id_materia = :id_materia");

    // Enviamos la consulta a la Base de Datos, estableciendo las variables que corresponden con el parámetro de la consulta, que es 'id_materia'.
    $resultado = $stmt->execute(
        array(
            ':id_materia' => $_POST["id_materia"]
        )
    );

    if (!empty($resultado)) {
        echo 'Materia eliminada';
    }
}



function obtener_nombre_imagen($id_materia)
{
    include "../../conn.php";
    // Preparar la consulta usando marcadores de posición
    $stmt = $conn->prepare("SELECT img FROM materias WHERE id_materia = :id_materia");
    $stmt->bindParam(':id_materia', $id_materia, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener el resultado como un arreglo asociativo
    $resultado = $stmt->fetch();

    if ($resultado) {
        return $resultado['img'];
    } else {
        return null; // Devuelve null si no se encontró ninguna imagen para la materia.
    }
}

?>