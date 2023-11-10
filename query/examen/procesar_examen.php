<?php
include('../../conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $materia = $_POST['materia'];
    $unidad = $_POST['unidad'];
    $tipo_examen = $_POST['tipo_examen'];
    $fecha = $_POST['fecha'];
    $id_docente = $_POST['id_docente'];

    // Realiza la inserción en la base de datos (modifica esto según tu estructura de base de datos)
    $insertExamen = $conn->prepare("INSERT INTO examenes (id_materia, id_unidad, tipo_examen, fecha_examen, id_docente) VALUES (:materia, :unidad, :tipo_examen, :fecha, :id_docente)");
    $insertExamen->bindParam(':materia', $materia, PDO::PARAM_INT);
    $insertExamen->bindParam(':unidad', $unidad, PDO::PARAM_INT);
    $insertExamen->bindParam(':tipo_examen', $tipo_examen, PDO::PARAM_STR);
    $insertExamen->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $insertExamen->bindParam(':id_docente', $id_docente, PDO::PARAM_INT);
    
    if ($insertExamen->execute()) {
        // Muestra el mensaje de éxito con SweetAlert
        echo "Examen agregado correctamente";
    } else {
        // Muestra el mensaje de error con SweetAlert
        echo "Error al guardar el examen";
    }
}
?>
