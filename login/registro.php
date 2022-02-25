<?php

include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");

$id = "";
$nombre = " ";
$apellido = " ";
$usuario= " ";
$contraseña = " ";

if($_SERVER['REQUEST_METHOD']==="POST" AND isset($_POST) and $_POST["Enviar"]==="Actualizar") {
    $id = $_POST["id"];
    $sql = "select * from usuarios where idu=$id";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //$id = $row["id"];
    $nombre = $row["nombres"];
    $apellido = $row["apellidos"];
    $usuario  = $row["usuario"];
    $contraseña = $row["contraseña"];
    
}
?>
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <form action="crudregistro.php" method="POST" enctype="multipart/form-data">
                <label class="from-label">Registro</label>
                <br>

                <input type="hidden" name="id" value="<?php echo $id?>" /><br>

                <label class="from-label">Ingrese Nombre</label><br>
                <input type="text" name=" nombre" class="from-control" placeholder="Ingrese Nombre" value="<?php echo $nombre?>"/><br>

                <label class="from-label1">Ingrese Apellido</label><br>
                <input type="text" name="apellido" class="from-control" placeholder="Ingrese Apellido" value="<?php echo $apellido?>"/><br>


                <label class="from-label1">Ingrese Usuario</label><br>
                <input type="text" name="usuario" class="from-control" placeholder="Ingrese el Usuario" value="<?php echo $usuario?>"/><br>


                <label class="from-label1">Ingrese Contraseña </label><br>
                <input type="text" name="clave" class="from-control" placeholder="Ingrese la clave" value="<?php echo $contraseña?>"/><br>


              

               
                <br>

                <button type="submit" class="byn btn-primay" name="Enviar" value="Guardar">Guardar </button>
            </form>
        </div>
    </div>
</div>

<?php 
include("../Plantillas/Pie.php");
?>