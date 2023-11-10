<?php
include "../../conn.php";

if (isset($_POST["id_unidad"])) {
    // Preparar la consulta para eliminar la unidad de la tabla "unidades_tematicas"
    $stmt = $conn->prepare("DELETE FROM unidades_tematicas WHERE id_unidad = :id_unidad");

    // Enviamos la consulta a la Base de Datos, estableciendo las variables que corresponden con el parámetro de la consulta, que es 'id_unidad'.
    $stmt->bindParam(':id_unidad', $_POST["id_unidad"]);
    $resultado = $stmt->execute();

    if (!empty($resultado)) {
        echo 'Unidad temática eliminada';
    } else {
        echo 'Error al eliminar la unidad temática';
    }
}
?>
