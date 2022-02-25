<?php
include("Plantillas/Encabezado.php");
include("Admin/BDD/Conexion.php");
session_start();
$validar = true;

$iva=0;
$apagar=0;
$subtotal=0;

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST) and $_POST["Operacion"] == "Add") {
    $id = $_POST["id"];
    $sql = "select * from productos where id=$id;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (!isset($_SESSION["Carrito"])) {

        $ProductoArray = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'cantidad' => 1,
            'importe' => $row['precio']

        );
        $_SESSION["Carrito"][$row['id']] = $ProductoArray;
    } else {
        foreach ($_SESSION["Carrito"] as $element) {
            if ($element["id"] == $id) {
                $_SESSION["Carrito"][$id]["cantidad"]++;
                $_SESSION["Carrito"][$id]["importe"] = $_SESSION["Carrito"][$id]["cantidad"] * $_SESSION["Carrito"][$id]["precio"];
                $validar = false;
            }
        }
        if ($validar) {
            $totalElemetos = count($_SESSION["Carrito"]);
            $ProductoArray = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'precio' => $row['precio'],
                'cantidad' => 1,
                'importe' => $row['precio']

            );
            $_SESSION["Carrito"][$row['id']] = $ProductoArray;
        }
    }
    header("Location:Carrito.php");
}else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST) and $_POST["Operacion"] == "delete"){
    //echo "Solicitaste eliminar el elemento :".$_POST["id"];
    $id =$_POST["id"];
    //print_r($_SESSION);
    //echo"<br>";
    unset($_SESSION["Carrito"][$id]);
    header("Location:Carrito.php");

}else if($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET) and $_GET["Operacion"] == "Actualizar"){
    $id= $_GET["id"];
    $cantidad = $_GET["cantidad"];
    
    $_SESSION["Carrito"][$id]["cantidad"] = $cantidad;
    $_SESSION["Carrito"][$id]["importe"] = $_SESSION["Carrito"][$id]["cantidad"] * $_SESSION["Carrito"][$id]["precio"];

}
    if (isset($_SESSION["Carrito"])){
        
    
foreach($_SESSION["Carrito"] as $totalElemetos){
    $subtotal+=$totalElemetos["importe"];


}
$iva=$subtotal*0.12;
$apagar=$subtotal+$iva;
$_SESSION["VALORES"]["SUBTOTAL"]=$subtotal;
$_SESSION["VALORES"]["IVA"]=$iva;
$_SESSION["VALORES"]["APAGAR"]=$apagar;
echo"Subtotal: $subtotal IVA $iva Apagar $apagar";
}