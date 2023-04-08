<?php 
require("conexion/bd.php");
date_default_timezone_set("America/Panama");

//CONTADOR DE DATOS
//TOTAL DE CUENTAS
$sql = "SELECT COUNT(*) AS total FROM cuentas WHERE Cuenta_de=4";
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()) {
    $andres = $row["total"];
}
//CAPITAL INVERTIDO
$sql2 = "SELECT SUM(Capital) AS capital FROM cuentas WHERE Cuenta_de=4";
$result2 = mysqli_query($conn,$sql2);
while($row2 = $result2->fetch_assoc()) {
    $capital = $row2["capital"];
}
//INTERES A PAGAR
$sql3 = "SELECT SUM(interes) AS interes FROM cuentas WHERE Cuenta_de=4";
$result3 = mysqli_query($conn,$sql3);
while($row3 = $result3->fetch_assoc()) {
    $interes = $row3["interes"];
}
//TOTAL A RECIBIR
$total_final = $capital+$interes;
?>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo $andres;?></h3>
                <h5>Cuentas Maya</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo $capital;?></h3>
                <h5>Capital Invertido</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo $interes;?></h3>
                <h5>Interes a recibir</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo number_format($total_final, 2, '.', '');?></h3>
                <h5>Total a Recibir</h5>
            </div>
        </div>
    </div>
</div>