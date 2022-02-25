<?php
include("../Admin/BDD/Conexion.php");

if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Guardar") {
    
    $id = $_POST['id'];
    $nombres = $_POST['nombre'];
    $apellidos= $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    

  

    if (empty($id)) {
        $sql = "insert into usuarios(idu, nombres, apellidos, usuario, clave)
    valueS ('null','$nombres','$apellidos','$usuario','$clave');";
    /*} else {
        $sql = "update productos set nombre='$nombres',marca='$marcas',
        detalle='$detalles',precio='$precios',stock='$stocks',foto='$nombreArchivo' where id=$id;";
    */
    }

    if ($conn->query($sql)) {
        echo "<script>alert ('Datos guardados corresramnete');</script> ";
    } else {
        echo "<script>alert ('Error al Guardar');</script> ";
    }

    $conn->close();
/*} else if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Eliminar") {
    $id = $_POST["id"];
    $sql = "delete from productos where id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert ('Datos eliminados');</script> ";
    } else {
        echo "<script>alert ('Intente nuevamente');</script> ";
    }
    $conn->close();*/
}

