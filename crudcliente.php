<?php
include("Admin/BDD/Conexion.php");

if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Guardar") {
    
    $id = $_POST['id'];
    $nombres = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $fechas = $_POST['fnacimiento'];
    $detalles = $_POST['detalle'];
    $urs =$_POST['urs'];
    $pwd =$_POST['pwd'];
    
    
    
    if (empty($id)) {
        $sql = "insert into clientes(id, nombre, apellido, fnacimiento, detalle,urs,pwd)
    values ('$id','$nombres','$apellidos','$fechas','$detalles','$urs','$pwd');";
    } else {
       
     $sql ="update clientes SET  nombre='$nombres',apellido='$apellidos',fnacimiento='$fechas',detalle='$detalles',urs='$urs',pwd='$pwd' WHERE id='$id'; ";
    }

    if ($conn->query($sql)) {
        echo "Datos guardados correctamente";
    } else {
        echo " Error al guardar";
    }

    $conn->close();
} else if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Eliminar") {
    $id = $_POST["id"];
    $sql = "delete from clientes where id=$id";
    if ($conn->query($sql)) {
        echo "Datos eliminados correctamente";
    } else {
        echo "Error al eliminar";
    }
    $conn->close();
}