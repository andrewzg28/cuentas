<?php 
require("../conexion/bd.php");
date_default_timezone_set("America/Panama");

//CONTADOR DE DATOS
//TOTAL DE AHORRO DE NIZ
$sql = "SELECT total FROM ahorro_niz ORDER BY id_niz DESC LIMIT 1";
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()) {
    $total = $row["total"];
}
?>
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $total;?></h3>
                <h5>Total Ahorrado por Niz</h5>
            </div>
        </div>
    </div>
</div>