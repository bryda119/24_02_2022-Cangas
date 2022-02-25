<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");

$id = "";
$nombre = " ";
$marca = " ";
$detalle= " ";
$precio = " ";
$stock=" ";
$foto = " ";

if($_SERVER['REQUEST_METHOD']==="POST" AND isset($_POST) and $_POST["Enviar"]==="Actualizar") {
    $id = $_POST["id"];
    $sql = "select * from productos where id=$id";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //$id = $row["id"];
    $nombre = $row["nombre"];
    $marca = $row["marca"];
    $detalle = $row["detalle"];
    $precio = $row["precio"];
    $stock = $row["stock"];
    $foto = $row["foto"];
}


?>
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <form action="crudproductos.php" method="POST" enctype="multipart/form-data">
                <label class="from-label">Formulario Productos</label>
                <br>

                <input type="hidden" name="id" value="<?php echo $id?>" /><br>

                <label class="from-label">Ingrese Nombre</label><br>
                <input type="text" name=" nombre" class="from-control" placeholder="Ingrese Nombre" value="<?php echo $nombre?>"/><br>

                <label class="from-label1">Ingrese la Marca </label><br>
                <input type="text" name="marca" class="from-control" placeholder="Ingrese Marca" value="<?php echo $marca?>"/><br>


                <label class="from-label1">Ingrese el Detalle </label><br>
                <input type="text" name="detalle" class="from-control" placeholder="Ingrese Detalle" value="<?php echo $detalle?>"/><br>


                <label class="from-label1">Ingrese el Precio </label><br>
                <input type="text" name="precio" class="from-control" placeholder="Ingrese Precio" value="<?php echo $precio?>"/><br>


                <label class="from-label1">Ingrese el Stock </label><br>
                <input type="text" name="stock" class="from-control" placeholder="Ingrese StoCk" value="<?php echo $stock?>"/><br>




                <label class="form-label">Seleccione una foto</label>
                <h3><?php echo "Foto: $foto"?></h3> 
                <input type="file" name="foto" class="form-control" />

                <br>

                <button type="submit" class="byn btn-primay" name="Enviar" value="Guardar">GUARDAR </button>
            </form>
        </div>
    </div>
</div>

<?php 
include("Plantillas/Pie.php");
?>