<?php
include('../../conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_examen = $_POST['id_examen'];

    // Realiza la eliminación en la base de datos (modifica esto según tu estructura de base de datos)
    $borrarExamen = $conn->prepare("DELETE FROM examenes WHERE id_examen = :id_examen");
    $borrarExamen->bindParam(':id_examen', $id_examen, PDO::PARAM_INT);

    if ($borrarExamen->execute()) {
        // Muestra el mensaje de éxito
        echo "Examen borrado correctamente";
    } else {
        // Muestra el mensaje de error
        echo "Error al borrar el examen";
    }
}
?>
