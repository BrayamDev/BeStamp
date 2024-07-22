<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nuevo Producto</title>
</head>

<body>
    <?php
    include '../Config/Conexion.php';
    include "../Header/HeaderAdmin.php";
    ?>

    <div class="p-3">
        <br>
        <div class="text-center bg-dark text-white border">
            <h1>Nueva camiseta</h1>
        </div>
        <form action="../CRUDProducto/Agregar_Producto.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <strong>
                                <h5 class="card-title">Informacion general</h5>
                            </strong>
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col">

                                        <div class="mb-3">
                                            <label class="form-label">Nombre del camiseta</label>
                                            <input required type="text" class="form-control" name="NombreProducto">
                                        </div>

                                    </div>
                                    <div class="col">

                                        <div class=" mb-3">
                                            <label class="form-label">Precio de la camiseta</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">$</span>
                                                <input name="PrecioProducto" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <strong>
                                <h5 class="card-title">Informacion general</h5>
                            </strong>
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Stock de la camiseta</label>
                                            <input required type="number" class="form-control" name="StockProducto">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Imagen</label>
                                            <input required type="file" class="form-control" name="ImagenProducto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Descripciones</h5>
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Descripcion de la camiseta</label>
                                            <textarea required class="form-control" placeholder="Descripcion del producto" name="DescripcionLargaProducto"></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Descripcion Corta</label>
                                            <textarea required class="form-control" placeholder="Descripcion del producto" name="DescripcionCorta"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-dark btn-sm"> <i class="fa-solid fa-plus"></i> Agregar camiseta</button>
                <a href="../Index.php" class="btn btn-dark btn-sm"><i class="fa-solid fa-backward-step"></i> Regresar</a>
            </div>
        </form>
    </div>
</body>

</html>