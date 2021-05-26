<?php 
require("../conexion/bd.php");
date_default_timezone_set("America/Panama");

//CONTADOR DE DATOS
//TOTAL ACUMULADO EN SUSU
$sql = "SELECT SUM(pago) AS total FROM susu";
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()) {
    $total = $row["total"];
}
$fecha = date('d/m');
$dia = date('d');
$mes = date('m');
if($dia <= 15){
    $pago_susu = "Primera Quincena";
    $sql2 = "SELECT Q1 FROM susu_toca WHERE id_susutoca = ".$mes."";
    $result2 = mysqli_query($conn,$sql2);
    while($row = $result2->fetch_assoc()) {
        $persona = $row["Q1"];
    }
}
else{
    $pago_susu = "Segunda Quincena";
    $sql2 = "SELECT Q2 FROM susu_toca WHERE id_susutoca = ".$mes."";
    $result2 = mysqli_query($conn,$sql2);
    while($row = $result2->fetch_assoc()) {
        $persona = $row["Q2"];
    }
}
?>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo $total;?></h3>
                <h5>Susu Acumulado</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?php echo $persona;?></h3>
                <h5>Propietario Actual</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $fecha;?></h3>
                <h5><?php echo $pago_susu;?></h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>$240.00</h3>
                <h5>Total a entregar</h5>
            </div>
        </div>
    </div>
</div>