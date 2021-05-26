<?php 
include('../baseurl.php');
include('../conexion/bd.php');
date_default_timezone_set("America/Panama");

if($view=="niz"){
    $sql = "SELECT id_niz,cantidad,estado,total FROM ahorro_niz ORDER BY id_niz DESC";
    $result = $conn->query($sql);
}
if($view=="susu"){
    $ano = date('Y');
    $mes = date('m');
    $sql = "SELECT id_susu,persona,pago FROM susu";
    $result = $conn->query($sql);

    $sql1 = "SELECT id_susutoca,mes,Q1,Q2 FROM susu_toca";
    $result1 = $conn->query($sql1);

    //PERSONAS QUE PAGAN SUSU
    $sql2 = "SELECT id_susu,persona FROM susu";
    $result2 = $conn->query($sql2);

    //PERSONAS QUE FALTAN POR PAGAR
    $sql3 = "SELECT id_susu, persona FROM susu WHERE pago = '0.00'";
    $result3 = $conn->query($sql3);
}
