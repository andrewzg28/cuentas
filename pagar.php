<?php 
include_once("conexion/bd.php");
date_default_timezone_set("America/Panama");

if(isset($_REQUEST["pago_cuenta"])){
    $p_capital = $_POST["p_capital"];
    $p_interes = $_POST["p_interes"];
    $a_capital = $_POST["capital_actual"];
    $a_interes = $_POST["interes_actual"];
    $id_cuenta = $_POST["id_cuenta"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $id_prestamista = $_POST["id_prestamista"];
    $total_actual = $a_capital+$a_interes;
    $total_pago = $p_capital+$p_interes;
  
    $fecha = date('d/m/Y');

    $sql = "INSERT INTO transacciones VALUE('','".$nombre."','".$apellido."','".$a_capital."','".$a_interes."','".$fecha."','".$p_interes."','".$p_capital."','".$fecha."','".$total_pago."','".$id_cuenta."','".$id_prestamista."')";
    $result = $conn->query($sql);

    $capital_nuevo = $a_capital-$p_capital;
    $interes_nuevo = $a_interes-$p_interes;
    $nuevo_total = $capital_nuevo+$interes_nuevo;
    $sql1 = "UPDATE cuentas set fecha_periodo = '".$fecha."', Capital = '".$capital_nuevo."', interes = '".$interes_nuevo."', total_pagar = '".$nuevo_total."' WHERE id_cpropia = $id_cuenta";
    $result1 = $conn->query($sql1);

    header("Location: ver_cuenta.php");
}

if(isset($_REQUEST["limpiar_cuenta"])){
    $id_cuenta = $_POST["id_cuenta"];
    
    $sql = "DELETE FROM transacciones WHERE id_cuenta = $id_cuenta";
    $result = $conn->query($sql);

    $sql1 = "DELETE FROM cuentas WHERE id_cpropia = $id_cuenta";
    $result1 = $conn->query($sql1);

    header("Location: menu.php");
}

if(isset($_REQUEST["nuevo_prestamo"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $capital = $_POST["capital"];
    $interes = $_POST["interes"];
    $prestamista = $_POST["prestamista"];
    $total = $capital+$interes;
    $fecha = date('d/m/Y');
    
    $sql = "INSERT INTO cuentas VALUE('','".$nombre."','".$apellido."','".$fecha."','".$capital."','".$interes."','".$total."','".$prestamista."')";
    $result = $conn->query($sql);

    header("Location: menu.php");
}
?>