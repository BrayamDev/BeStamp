<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS-->
    <link rel="stylesheet" href="../StyleH.css">
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Fuente-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Producto</title>
</head>

<body>
    <?php include "../Header/HeaderAdmin.php"; ?>
    <div class="container">
        <br>
        <?php
        include '../Config/Conexion.php';

        if (isset($_GET['id'])) {
            
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM productos WHERE Id_Producto = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $item = $stmt->fetch();
        }
        ?>

        <div class="container text-center">
            <div class="row row-cols-2">
                <div class="col">
                    <div class="p-3 border">
                        <h1><?php echo $item['NombreProducto'] ?></h1>
                        <img style="width: 300px;" src='../Archivos/<?php echo $item['Imagen']; ?>' >
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h3>Precio: $<?php echo $item['Precio'] ?></h3>
                        <hr>
                        <h3>Stock:  <?php echo $item['Stock'] ?></h3>
                        <hr>
                        <h4><?php echo $item['DescripcionLarga'] ?></h4>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container text-center">
            <a href="../Index.php" class="btn btn-dark btn-sm">
                <i class="fa-solid fa-angle-left"></i>
                Regresar
            </a>
        </div>
    </div>
</body>

</html>