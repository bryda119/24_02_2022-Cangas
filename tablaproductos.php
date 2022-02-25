<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");
$sql = "select * from productos";
$result = $conn->query($sql);
/*if($_SESSION['PERMISO'] ){
    $sql="select *from productos";
    $result=$conn->query($sql);

//}else{
  //  header("Location: login.php");
}

*/

?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Detale</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Foto</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($r = $result->fetch_assoc()) { ?>
                    <tr>

                        <td><?php echo $r['id']; ?> </td>
                        <td><?php echo $r['nombre']; ?></td>
                        <td><?php echo $r['marca']; ?></td>
                        <td> <?php echo $r['detalle']; ?></td>
                        <td><?php echo $r['precio']; ?></td>
                        <td><?php echo $r['stock']; ?></td>
                        <td> <img class="img-thumbnail" src="img/Productos/<?php echo $r['foto']; ?>" alt=""></td>

                        <td>
                            <form action="crudproductos.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">

                                <button type="submit" class="btn btn-danger" name="Enviar" value="Eliminar">Eliminar </button>

                            </form>
                        </td>
                        <td>

                            <form action="formularioproduc.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">

                                <button type="submit" class="btn btn-success" name="Enviar" value="Actualizar">Actualizar </button>

                            </form>
                        </td>
                        </td>
                    </tr>
                <?php
                }
                $conn->close();
                ?>
            </tbody>
        </table>

    </div>
</div>