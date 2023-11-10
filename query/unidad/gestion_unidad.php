<?php
include "../../conn.php"; // Asegúrate de que la ruta sea la correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['operacion'] == 'Crear') {
    $idMateria = $_POST['materia'];  // Actualizado para reflejar el nombre correcto del campo del formulario
    $nombreUnidad = $_POST['nombre_unidad'];

    $stmt = $conn->prepare("INSERT INTO unidades_tematicas (id_materia, nombre_unidad) VALUES (:id_materia, :nombre_unidad)");

    $stmt->bindParam(':id_materia', $idMateria);
    $stmt->bindParam(':nombre_unidad', $nombreUnidad);

    if ($stmt->execute()) {
        echo 'Unidad temática creada exitosamente.';
    } else {
        echo 'Error al crear la unidad temática.';
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['operacion'] == 'Editar') {
    $idUnidad = $_POST['id_unidad'];
    $idMateria = $_POST['id_materia'];
    $nombreUnidad = $_POST['nombre_unidad'];

    $stmt = $conn->prepare("UPDATE unidades_tematicas SET id_materia = :id_materia, nombre_unidad = :nombre_unidad WHERE id_unidad = :id_unidad");

    $stmt->bindParam(':id_materia', $idMateria);
    $stmt->bindParam(':nombre_unidad', $nombreUnidad);
    $stmt->bindParam(':id_unidad', $idUnidad);

    if ($stmt->execute()) {
        echo 'Unidad temática actualizada exitosamente.';
    } else {
        echo 'Error al actualizar la unidad temática.';
    }
}
