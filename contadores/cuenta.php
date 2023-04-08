<?php 
require("conexion/bd.php");
date_default_timezone_set("America/Panama");

//CONTADOR DE DATOS
//TOTAL DE CUENTAS
$sql = "SELECT Cuenta_de FROM cuentas WHERE id_cpropia = $id_cuenta";
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()) {
    if($row["Cuenta_de"]==1){
        $prestamista = "Andrés";
        $id_prestamista = $row["Cuenta_de"];
      }
      elseif($row["Cuenta_de"]==2){
        $prestamista = "Tahis";
        $id_prestamista = $row["Cuenta_de"];
      }
      elseif($row["Cuenta_de"]==3){
        $prestamista = "Sociedad";
        $id_prestamista = $row["Cuenta_de"];
      }
      elseif ($row["Cuenta_de"]==4) {
        $prestamista = "Maya";
        $id_prestamista = $row["Cuenta_de"];
      }
}
//CAPITAL INVERTIDO
$sql2 = "SELECT Capital,id_cpropia FROM cuentas WHERE id_cpropia = $id_cuenta";
$result2 = mysqli_query($conn,$sql2);
while($row2 = $result2->fetch_assoc()) {
    $capital = $row2["Capital"];
    $id_cuenta = $row2["id_cpropia"];
}
//INTERES A PAGAR
$sql3 = "SELECT interes FROM cuentas WHERE id_cpropia = $id_cuenta";
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
                <h3><?php echo $prestamista;?></h3>
                <h5>Prestamista</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo $capital;?></h3>
                <h5>Capital a pagar</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo $interes;?></h3>
                <h5>Interes a pagar</h5>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #2663a1; color:white;">
            <div class="inner">
                <h3><?php echo number_format($total_final, 2, '.', '');?></h3>
                <h5>Total a Pagar</h5>
            </div>
        </div>
    </div>
</div>