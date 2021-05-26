<?php 
include_once("../conexion/bd.php");
date_default_timezone_set("America/Panama");

if(isset($_REQUEST["pagar_susu"])){
    $id_persona = $_POST["persona"];
    $cantidad = "10.00";

    $sql1 = "UPDATE susu SET pago = '".$cantidad."' WHERE id_susu = ".$id_persona."";
    $result1 = $conn->query($sql1);
    header("Location: susu.php");
}

if(isset($_REQUEST["limpiar"])){
    $sql = "UPDATE susu SET pago = 0";
    $result = $conn->query($sql);
    header("Location: susu.php");
}
