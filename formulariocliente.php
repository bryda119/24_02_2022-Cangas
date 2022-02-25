<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");


$id = "";
$nombre = " ";
$apellido = " ";
$urs =" ";
$pwd =" ";
$fecha= " ";
$detalle = " ";


if($_SERVER['REQUEST_METHOD']==="POST" AND isset($_POST) and $_POST["Enviar"]==="Actualizar") {
    $id = $_POST["id"];
    $sql = "select * from clientes where id=$id";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  //  $id = $row["id"];
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $urs = $row["urs"];
    $pwd =$row["pwd"];
    $fecha = $row["fnacimiento"];
    $detalle = $row["detalle"];
    
}


?>
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <form action="crudcliente.php" method="POST" enctype="multipart/form-data">
                <label class="from-label">Formulario Cliente</label>
                <br>

                <input type="hidden" name="id" value="<?php echo $id?>" /><br>

                <label class="from-label">Ingrese Nombre</label><br>
                <input type="text" name=" nombre" class="from-control" placeholder="Ingrese Nombre" value="<?php echo $nombre?>"/><br>

                <label class="from-label1">Ingrese el Apellido </label><br>
                <input type="text" name="apellido" class="from-control" placeholder="Ingrese Apellido" value="<?php echo $apellido?>"/><br>
                
                <label class="from-label1">Ingrese el Usuario </label><br>
                <input type="text" name="urs" class="from-control" placeholder="Ingrese Usuario" value="<?php echo $urs ?>"/><br>
                
                <label class="from-label1">Ingrese el Contraseña </label><br>
                <input type="text" name="pwd" class="from-control" placeholder="Ingrese Contraseña" value="<?php echo $pwd ?>"/><br>
                
                <label class="from-label1">Ingrese la Fecha de Naciemiento </label><br>
                <input type="date" name="fnacimiento" class="from-control" placeholder="Ingrese la fecha" value="<?php echo $fecha?>"/><br>


                <label class="from-label1">Ingrese el Detalle </label><br>
                <input type="text" name="detalle" class="from-control" placeholder="Ingrese el detalle" value="<?php echo $detalle?>"/><br>

                <br>

                <button type="submit" class="byn btn-primay" name="Enviar" value="Guardar">GUARDAR </button>
            </form>
        </div>
    </div>
</div>

<?php 
include("Plantillas/Pie.php");
?>