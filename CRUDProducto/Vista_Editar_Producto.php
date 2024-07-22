<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS-->
    <link rel="stylesheet" href="StyleH.css">
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuente-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Modificar Producto</title>
</head>

<body>
    <?php
    include '../Header/HeaderAdmin.php';
    include '../Config/Conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM productos WHERE Id_Producto = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $item = $stmt->fetch();
    }
    ?>

    <div class="container p-3 text-center">
        <h1>Editar Estampado</h1>
    </div>
    <div class="container">
        <form action="Editar_Producto.php" method="POST" enctype="multipart/form-data">
            <div class="row text-right">
                <div class="col text-center">
                    <img style="width: 400px;" src='../Archivos/<?php echo $item['Imagen']; ?>'>
                </div>
                <div class="col">
                    <div class="row row-cols-2">
                        <div>
                            <input type="hidden" name="id" value="<?php echo $item['Id_Producto']; ?>">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Nombre del producto</label>
                                    <input required type="text" class="form-control" name="NombreProducto" value="<?php echo $item['NombreProducto']; ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Stock del producto</label>
                                    <input required type="text" class="form-control" name="StockProducto" value="<?php echo $item['Stock'] ?>">
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label">Precio del producto</label>
                                        <input required type="text" class="form-control" name="PrecioProducto" value="<?php echo $item['Precio'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label">Imagen del producto</label>
                                    <input type="file" class="form-control" name="ImagenProducto">
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label">Descripcion corta producto</label>
                                        <textarea name="DescripcionCorta" class="form-control" style="height: 125px"><?php echo $item['DescripcionCorta'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <label class="form-label">Descripcion del producto</label>
                        <textarea name="DescripcionLargaProducto" class="form-control" style="height: 150px"><?php echo $item['DescripcionLarga'] ?></textarea>
                    </div>
                </div>
                <div class="p-3 text-center">
                    <button type="submit" class="btn btn-dark">
                        Editar estampado
                    </button>
                    <a href="Vista_Producto.php" class="btn btn-dark">
                        Regresar
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>