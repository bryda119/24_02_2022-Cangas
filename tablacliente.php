<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");

$sql = "Select * from clientes;";
$result = $conn->query($sql);

//  header("Location: Login.php");

?>
<div class="container">
    <div class="row">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>

                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CEDULA</th>
                    <th></th>
        
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($r = $result->fetch_assoc()) { ?>
                    <tr>

                        <td><?php echo $r['id']; ?></td>
                        <td><?php echo $r['nombres']; ?></td>
                        <td><?php echo $r['apellidos']; ?></td>
                        <td><?php echo $r['cedula']; ?></td>
                        <td><?php //echo $r['detalle']; ?></td>
                
                        <td>
                            <form action="crudcliente.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                                <button type="submit" class="btn btn-danger" name="Enviar" value="Eliminar">Eliminar</button>
                            </form>
                        </td>

                        <td>
                            <form action="Formulariocliente.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                                <button type="submit" class="btn btn-success" name="Enviar" value="Actualizar">Actualizar</button>
                            </form>
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
<?php include("Plantillas/pie.php") ?>