<?php 
date_default_timezone_set("America/Panama");

if($view=="susu"){
    $ano = date('Y');
    $mes = date('m');
    $dia = date('d');
    $sql = "SELECT id_susu,persona,pago FROM susu";
    $result = $conn->query($sql);

    $sql1 = "SELECT id_susutoca,mes,Q1,Q2 FROM susu_toca";
    $result1 = $conn->query($sql1);

    //PERSONAS QUE PAGAN SUSU
    $sql2 = "SELECT id_susu,persona FROM susu WHERE pago = '0.00'";
    $result2 = $conn->query($sql2);

    //PERSONAS QUE FALTAN POR PAGAR
    $sql3 = "SELECT id_susu, persona FROM susu WHERE pago = '0.00'";
    $result3 = $conn->query($sql3);
}

