<?php
include("Admin/BDD/Conexion.php");

/*$nombres = $_POST['nombre'];
$marca = $_POST['marca'];
$detalle = $_POST['detalle'];
$rpecio = $_POST['precio'];
$stock = $_POST['stock'];*/



if (isset($_POST["Enviar"]) && $_POST["Enviar"] === "Eliminar") {
    $ids = $_POST["id"];
    $sql = "delete from productos where idp=$ids";
    if ($conn->query($sql)) {
        echo "Datos eliminados correctamente";
    } else {
        echo "Error al eliminar";
    }
    $conn->close();
}