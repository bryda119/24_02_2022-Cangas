<?php
include("Admin/BDD/Conexion.php");
$ruta = "img/Productos/";
if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Guardar") {
    
    $id = $_POST['id'];
    $nombres = $_POST['nombre'];
    $marcas = $_POST['marca'];
    $detalles = $_POST['detalle'];
    $precios = $_POST['precio'];
    $stocks = $_POST['stock'];

    $nombreArchivo = $_FILES["foto"]["name"];
    $ruta = $ruta . basename($_FILES["foto"]["name"]);
    if (!(move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta))) {
        echo "<script>alert ('Error al subir archivos');</script> ";
        return false;
    }

    if (empty($id)) {
        $sql = "insert into productos(id, nombre, marca, detalle, precio,stock, foto)
    valueS ('$id','$nombres','$marcas','$detalles','$precios','$stocks','$nombreArchivo');";
    } else {
        $sql = "update productos set nombre='$nombres',marca='$marcas',
        detalle='$detalles',precio='$precios',stock='$stocks',foto='$nombreArchivo' where id=$id;";
    }

    if ($conn->query($sql)) {
        echo "<script>alert ('Datos guardados corresramnete');</script> ";
    } else {
        echo " Error al guardar";
    }

    $conn->close();
} else if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Eliminar") {
    $id = $_POST["id"];
    $sql = "delete from productos where id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert ('Datos eliminados');</script> ";
    } else {
        echo "<script>alert ('Intente nuevamente');</script> ";
    }
    $conn->close();
}

