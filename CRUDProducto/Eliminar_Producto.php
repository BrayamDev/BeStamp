<?php


include '../Config/Conexion.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Obtener el nombre de la imagen para eliminarla del servidor
    $sql = "SELECT Imagen FROM productos WHERE Id_Producto = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $item = $stmt->fetch();

    if ($item) {
        // Eliminar la imagen del servidor
        unlink('../Archivos/' . $item['Imagen']);

        // Eliminar el registro de la base de datos
        $sql = "DELETE FROM productos WHERE Id_Producto = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: Vista_Producto.php");
        } else {
            echo "Error al eliminar el item.";
        }
    } else {
        echo "Ítem no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}
