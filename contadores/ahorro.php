<?php 
require("../conexion/bd.php");
date_default_timezone_set("America/Panama");

//CONTADOR DE DATOS
//TOTAL AHORRO
$sql_lina = "SELECT SUM(lina) AS total_lina FROM ahorro";
$result_lina = mysqli_query($conn,$sql_lina);
while($row_lina = $result_lina->fetch_assoc()) {
    $total_lina = $row_lina["total_lina"];
}
$sql_china = "SELECT SUM(china) AS total_china FROM ahorro";
$result_china = mysqli_query($conn,$sql_china);
while($row_china = $result_china->fetch_assoc()) {
    $total_china = $row_china["total_china"];
}
$sql_janeth = "SELECT SUM(janeth) AS total_janeth FROM ahorro";
$result_janeth = mysqli_query($conn,$sql_janeth);
while($row_janeth = $result_janeth->fetch_assoc()) {
    $total_janeth = $row_janeth["total_janeth"];
}
$sql_tahis = "SELECT SUM(tahis) AS total_tahis FROM ahorro";
$result_tahis = mysqli_query($conn,$sql_tahis);
while($row_tahis = $result_tahis->fetch_assoc()) {
    $total_tahis = $row_tahis["total_tahis"];
}
$sql_andres = "SELECT SUM(andres) AS total_andres FROM ahorro";
$result_andres = mysqli_query($conn,$sql_andres);
while($row_andres = $result_andres->fetch_assoc()) {
    $total_andres = $row_andres["total_andres"];
}
$sql_maya = "SELECT SUM(maya) AS total_maya FROM ahorro";
$result_maya = mysqli_query($conn,$sql_maya);
while($row_maya = $result_maya->fetch_assoc()) {
    $total_maya = $row_maya["total_maya"];
}
$sql_chico = "SELECT SUM(chico) AS total_chico FROM ahorro";
$result_chico = mysqli_query($conn,$sql_chico);
while($row_chico = $result_chico->fetch_assoc()) {
    $total_chico = $row_chico["total_chico"];
}
$sql_beto = "SELECT SUM(beto) AS total_beto FROM ahorro";
$result_beto = mysqli_query($conn,$sql_beto);
while($row_beto = $result_beto->fetch_assoc()) {
    $total_beto = $row_beto["total_beto"];
}
$sql_yeimy = "SELECT SUM(yeimy) AS total_yeimy FROM ahorro";
$result_yeimy = mysqli_query($conn,$sql_yeimy);
while($row_yeimy = $result_yeimy->fetch_assoc()) {
    $total_yeimy = $row_yeimy["total_yeimy"];
}
$sql_dana = "SELECT SUM(dana) AS total_dana FROM ahorro";
$result_dana = mysqli_query($conn,$sql_dana);
while($row_dana = $result_dana->fetch_assoc()) {
    $total_dana = $row_dana["total_dana"];
}

$sum_total = $total_lina+$total_china+$total_janeth+$total_tahis+$total_andres+$total_maya+$total_chico+$total_beto+$total_yeimy+$total_dana;


?>
<div class="row">
    <div class="col-lg-6 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3><?php echo "$".$sum_total.".00";?></h3>
                <h5>Total Ahorrado</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>$100.00</h3>
                <h5>Total a ahorrar</h5>
            </div>
        </div>
    </div>
</div>