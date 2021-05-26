<?php 
require("conexion/bd.php");
date_default_timezone_set("America/Panama");

//CONTADOR DE DATOS
//ANDRES
$sql = "SELECT COUNT(*) AS total FROM cuentas WHERE Cuenta_de=1";
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()) {
    $andres = $row["total"];
}
//TAHIS
$sql2 = "SELECT COUNT(*) AS total FROM cuentas WHERE Cuenta_de=2";
$result2 = mysqli_query($conn,$sql2);
while($row2 = $result2->fetch_assoc()) {
    $tahis = $row2["total"];
}
//SOCIEDAD
$sql3 = "SELECT COUNT(*) AS total FROM cuentas WHERE Cuenta_de=3";
$result3 = mysqli_query($conn,$sql3);
while($row3 = $result3->fetch_assoc()) {
    $sociedad = $row3["total"];
}
//MAYA
$sql4 = "SELECT COUNT(*) AS total FROM cuentas WHERE Cuenta_de=4";
$result4 = mysqli_query($conn,$sql4);
while($row4 = $result4->fetch_assoc()) {
    $maya = $row4["total"];
}
?>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $andres;?></h3>
                <h5>Cuentas Andrés</h5>
            </div>
            <a href="andres.php" class="small-box-footer">Ver Cuentas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo $tahis;?></h3>
                <h5>Cuentas Tahis</h5>
            </div>
            <a href="tahis.php" class="small-box-footer">Ver Cuentas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo $sociedad;?></h3>
                <h5>Cuentas Sociedad</h5>
            </div>
            <a href="sociedad.php" class="small-box-footer">Ver Cuentas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo $maya;?></h3>
                <h5>Cuentas Maya</h5>
            </div>
            <a href="maya.php" class="small-box-footer">Ver Cuentas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>