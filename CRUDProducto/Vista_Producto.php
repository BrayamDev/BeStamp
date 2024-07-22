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
    <!--cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script language="javascript" src="../js/jquery-3.1.1.min.js"></script>
    <title>Vista Producto</title>
</head>

<body>
    <?php include "../Header/HeaderAdmin.php" ?>
    <div class="container">
        <br>
        <center>
            <h1>Lista de productos</h1>
            <a href="../CRUDProducto/Vista_Nuevo_Producto.php" class="btn btn-dark"><i class="fa-solid fa-circle-plus"></i> Nuevo Producto</a>
            <a href="" class="btn btn-dark"><i class="fa-regular fa-file-excel"></i> Excel</a>
            <a href="" class="btn btn-dark"><i class="fa-solid fa-file-pdf"></i> Generar pdf</a>
            <a href="../Index.php" class="btn btn-dark"> <i class="fa-solid fa-angle-left"></i> Regresar</a>
        </center>
        <div class="container">
            <table class="table table-striped display compact text-center" id="idTabla">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Descripcion Corta</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../Config/Conexion.php';
                    $sql = "SELECT * FROM productos";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $items = $stmt->fetchAll();;

                    foreach ($items as $item) : ?>
                        <tr>
                            <th scope="row"><?php echo $item['Id_Producto'] ?></th>
                            <td><?php echo $item['NombreProducto'] ?></td>
                            <td>$<?php echo $item['Precio'] ?></td>
                            <td><?php echo $item['Stock'] ?></td>
                            <td><img style="width: 200px;" src='../Archivos/<?php echo $item['Imagen']; ?>'></td>
                            <td><?php echo $item['DescripcionLarga'] ?></td>
                            <td><?php echo $item['DescripcionCorta'] ?></td>
                            <td>
                                <a href="Vista_Editar_Producto.php?id=<?php echo $item['Id_Producto'] ?>" class="btn btn-warning">
                                    Editar
                                </a>
                                <button class="btn btn-danger" onclick="openModal(<?php echo $item['Id_Producto']; ?>)">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="container">
        <div id="myModal" class="modal text-center">
            <div class="modal-content">
                <p>¿Estás seguro de que quieres eliminar este estampado?</p>
                <form id="deleteForm" action="../CRUDProducto/Eliminar_Producto.php" method="GET">
                    <input type="hidden" name="id" id="itemId">
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    <button class="btn btn-primary" type="button" onclick="closeModal()">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../Js/Script.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idTabla').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json',
                },
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'Todos']
                ]
            });
        })
    </script>
    <!--boostrap5-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>