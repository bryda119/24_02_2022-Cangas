<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");


$_SESSION["PERMISO"] = false;
$_SESSION["NOMBRE"] = "";
$_SESSION["APELLIDO"] = "";

if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_POST)) {

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $sql = "select * from usuarios where usuario = '$usuario' and clave = '$clave'; ";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["PERMISO"] = true;
        $_SESSION["NOMBRE"] = $row["nombre"];
        $_SESSION["APELLIDO"] = $row["apellido"];

        echo "<script>
    alert ('Bienvenido');
    window.location.href= 'index.php';
    </script>";
    } else {
        echo "<script>alert ('Intente nuevamente');</script> ";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="POST">
               <br> <label class="form-label">Bienvenidos</label><br>
               <br> <label class="form-label">Ingrese su Usuario</label></br>
                <input type="text" name="usuario" class="form-control " placeholder="Ingrese su Usuario" />
                <label class="form-label">Ingrese su Clave</label>
                <input type="pasword" name="clave" class="form-control " placeholder="Ingrese su Clave" />
                <br><input type="submit" name="enviarLogin" class="btn btn-primary" value="ENVIAR " /></br>

            </form>
            

        </div>
    </div>
</div>
<?php include("Plantillas/pie.php") ?>