<?php


include '../Config/Conexion.php';


// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {

//     $id = $_POST['id'];
//     $nombreproducto = $_POST['NombreProducto'];
//     $stockproducto = $_POST['StockProducto'];
//     $descripcionproducto = $_POST['DescripcionLargaProducto'];
//     $descripcioncorta = $_POST['DescripcionCorta'];
//     $precioproducto = $_POST['PrecioProducto'];
//     $imagenproducto = $_FILES['ImagenProducto']['name'];
//     $target_dir = '../Archivos/';
//     $target_file = $target_dir . basename($imagenproducto);

//     if ($imagenproducto) {
//         if (move_uploaded_file($_FILES['ImagenProducto']['tmp_name'], $target_file)) {
//             $sql = "UPDATE productos SET
//             NombreProducto = :NombreProducto, 
//             Stock = :StockProducto, 
//             DescripcionLarga = :DescripcionLargaProducto, 
//             DescripcionCorta = :DescripcionCorta , 
//             Precio = :PrecioProducto, 
//             Imagen = :ImagenProducto
//             WHERE Id_Producto = :id";

//             $stmt = $conn->prepare($sql);
//             $stmt->bindParam(':NombreProducto', $nombreproducto);
//             $stmt->bindParam(':StockProducto', $stockproducto);
//             $stmt->bindParam(':DescripcionLargaProducto', $descripcionproducto);
//             $stmt->bindParam(':DescripcionCorta', $descripcioncorta);
//             $stmt->bindParam(':PrecioProducto', $precioproducto);
//             $stmt->bindParam(':ImagenProducto', $imagenproducto);
//             $stmt->bindParam(':id', $id);
//         } else {
//             echo "Error al subir la imagen";
//         }
//         if ($stmt->execute()) {
//             echo "Item actualizado exitosamente";
//         } else {
//             echo "Error al actualizar el item";
//         }
//     } else {
//         $sql = "UPDATE productos SET
//         NombreProducto = :NombreProducto, 
//         Stock = :StockProducto, 
//         DescripcionLarga = :DescripcionLargaProducto, 
//         DescripcionCorta = :DescripcionCorta , 
//         Precio = :PrecioProducto, 
//         WHERE Id_Producto = :id";

//         $stmt = $conn->prepare($sql);
//         $stmt->bindParam(':NombreProducto', $nombreproducto);
//         $stmt->bindParam(':StockProducto', $stockproducto);
//         $stmt->bindParam(':DescripcionLargaProducto', $descripcionproducto);
//         $stmt->bindParam(':DescripcionCorta', $descripcioncorta);
//         $stmt->bindParam(':PrecioProducto', $precioproducto);
//         $stmt->bindParam(':id', $id);
//         if ($stmt->execute()) {
//             echo "Item actualizado exitosamente";
//         } else {
//             echo "Error al actualizar el item";
//         }
//     }
   
// }


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombreproducto = $_POST['NombreProducto'];
    $stockproducto = $_POST['StockProducto'];
    $descripcionproducto = $_POST['DescripcionLargaProducto'];
    $descripcioncorta = $_POST['DescripcionCorta'];
    $precioproducto = $_POST['PrecioProducto'];
    $imagenproducto = $_FILES['ImagenProducto']['name'];
    $target_dir = '../Archivos/';
    $target_file = $target_dir . basename($imagenproducto);

    if ($imagenproducto) {
        // Subir la nueva imagen
        if (move_uploaded_file($_FILES['ImagenProducto']['tmp_name'], $target_file)) {
            $sql = "UPDATE productos SET
                    NombreProducto = :NombreProducto, 
                    Stock = :StockProducto, 
                    DescripcionLarga = :DescripcionLargaProducto, 
                    DescripcionCorta = :DescripcionCorta, 
                    Precio = :PrecioProducto, 
                    Imagen = :ImagenProducto
                    WHERE Id_Producto = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':NombreProducto', $nombreproducto);
            $stmt->bindParam(':StockProducto', $stockproducto);
            $stmt->bindParam(':DescripcionLargaProducto', $descripcionproducto);
            $stmt->bindParam(':DescripcionCorta', $descripcioncorta);
            $stmt->bindParam(':PrecioProducto', $precioproducto);
            $stmt->bindParam(':ImagenProducto', $imagenproducto);
            $stmt->bindParam(':id', $id);
        } else {
            echo "Error al subir la imagen";
            exit;
        }
    } else {
        // No subir nueva imagen, mantener la actual
        $sql = "UPDATE productos SET
                NombreProducto = :NombreProducto, 
                Stock = :StockProducto, 
                DescripcionLarga = :DescripcionLargaProducto, 
                DescripcionCorta = :DescripcionCorta, 
                Precio = :PrecioProducto
                WHERE Id_Producto = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':NombreProducto', $nombreproducto);
        $stmt->bindParam(':StockProducto', $stockproducto);
        $stmt->bindParam(':DescripcionLargaProducto', $descripcionproducto);
        $stmt->bindParam(':DescripcionCorta', $descripcioncorta);
        $stmt->bindParam(':PrecioProducto', $precioproducto);
        $stmt->bindParam(':id', $id);
    }

    if ($stmt->execute()) {
        header("Location: Vista_Producto.php");
    } else {
        echo "Error al actualizar el item";
    }
}