<?php

require("Admin/fpdf/fpdf.php");
session_start();
include("Admin/BDD/Conexion.php");
$Fpdf = new FPDF();
$Fpdf->AddPage();
$Fpdf->SetFont("Arial","B",40);
$Fpdf->Image("img/Productos/yamaha.jpg",170,5,25,25,);
$Fpdf->SetX(150);
$Fpdf->Sety(15);
$textypos = 5;
$Fpdf->Cell(5,$textypos,"Factura de la compra");
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->Ln();
$Fpdf->SetFont("Arial","I",10);
//$Fpdf->SetTextColor(220,50,50); para el color de letra
$sql="Select * from clientes;";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$Fpdf->Cell(30,10,"Nombre:");
    $Fpdf->Cell(65,10,$row["nombres"]);
    $Fpdf->Ln(5);
    $Fpdf->Cell(30,10,"Apellido:");
    $Fpdf->Cell(65,10,$row["apellidos"]);
    $Fpdf->Ln(5);
    $Fpdf->Cell(30,10,"Cedula:");
    $Fpdf->Cell(65,10,$row["cedula"]);
    $Fpdf->Ln(5);
    $Fpdf->Cell(30,10,"Usuario:");
    $Fpdf->Cell(65,10,$row["usr"]);
    $Fpdf->Ln(5);
    $Fpdf->Cell(30,10,"Fecha:");
    $fechaActual = date('d-m-Y');
    $Fpdf->Cell(65,10,$fechaActual);
    $Fpdf->Ln();
    $Fpdf->Ln();
// factura elements
$Fpdf->Cell(30,10,"PRODUCTO",true);
$Fpdf->Cell(80,10,"CANTIDAD",true);
$Fpdf->Cell(20,10,"V.UNIT",true);
$Fpdf->Cell(20,10,"V.TOTAL",true);
$Fpdf->Ln();
foreach ($_SESSION["CARRITO"] as $elemento) {
    $idp = $elemento["nombre"];
    $cantidad = $elemento["cantidad"];
    $precio = $elemento["precio"];
    $importe = $elemento["importe"];
    
        $Fpdf->Cell(30,10,$idp,true);
        $Fpdf->Cell(80,10,$cantidad,true);
        $Fpdf->Cell(20,10,$precio,true);
        $Fpdf->Cell(20,10,$importe,true);
        $Fpdf->Ln();
    
}

$Fpdf->Ln();
$Fpdf->SetFillColor(224,235,255);
$Fpdf->SetTextColor(0);
$Fpdf->SetFont("Arial","B",16);
$Fpdf->SetDrawColor(89, 154, 184);


//$Fpdf->SetLineWidth(.3);
$subtotal = 0;
        $IVA = 0;
        $aPagar = 0;
        foreach ($_SESSION["CARRITO"] as $elemento) {
            $subtotal += $elemento["importe"];
        }
        $IVA = $subtotal * 0.12;
        $aPagar = $subtotal + $IVA;
        $Fpdf->Cell(110,10,"SUBTOTAL:",true,);
        $Fpdf->Cell(40,10,$subtotal,true,);
        $Fpdf->Ln();
        $Fpdf->Cell(110,10,"IVA",true);
        $Fpdf->Cell(40,10,$IVA,true);
        $Fpdf->Ln();
        $Fpdf->Cell(110,10,"TOTAL",true);
        $Fpdf->Cell(40,10,$aPagar,true);

$Fpdf->Output();

