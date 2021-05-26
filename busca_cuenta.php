<?php 
include("baseurl.php");
session_start();
if(isset($_REQUEST["busca_cuenta"])){
    $id_cuenta = $_POST["id_cuenta"];
    $_SESSION["id_cuenta"]=$id_cuenta;
    echo "<script>window.location.href = '" . $baseurl . "ver_cuenta.php';</script>";
}
?>