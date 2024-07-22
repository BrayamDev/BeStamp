<?php

include '../Config/Conexion.php';

/*Tomamos los campos del formulario */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreproducto = $_POST['NombreProducto'];
    $precioproducto = $_POST['PrecioProducto'];
    $stockproducto = $_POST['StockProducto'];

    $imagenproducto = $_FILES['ImagenProducto']['name'];
    $target_dir = '../Archivos/';
    $target_file = $target_dir . basename($imagenproducto);

    $descripcionproducto = $_POST['DescripcionLargaProducto'];
    $descripcioncorta = $_POST['DescripcionCorta'];

    // Subir la imagen
    if (move_uploaded_file($_FILES['ImagenProducto']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO  productos (NombreProducto,Stock,DescripcionLarga, DescripcionCorta,Precio,Imagen) 
    VALUES(:NombreProducto,:StockProducto,:DescripcionLargaProducto,:DescripcionCorta,:PrecioProducto, :ImagenProducto)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':NombreProducto', $nombreproducto);
        $stmt->bindParam(':StockProducto', $stockproducto);
        $stmt->bindParam(':DescripcionLargaProducto', $descripcionproducto);
        $stmt->bindParam(':DescripcionCorta', $descripcioncorta);
        $stmt->bindParam(':PrecioProducto', $precioproducto);
        $stmt->bindParam(':ImagenProducto', $imagenproducto);

        if ($stmt->execute()) {
            header('Location: Vista_Producto.php');
            exit;
        } else {
            echo 'No se inserto';
        }
    }
}
