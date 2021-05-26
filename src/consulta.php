<?php 
include('baseurl.php');
date_default_timezone_set('America/Panama');

if($view=="menu"){
    $sql = "SELECT Nombre,Apellido,Cuenta_de, id_cpropia FROM cuentas";
    $result = $conn->query($sql);
    $tabla = "";
if(isset($_REQUEST["btn_buscar"])){
    $id_cuenta = $_POST["id"];
    $sql1 = "SELECT Nombre,Apellido,fecha_periodo,Capital,interes,total_pagar, id_cpropia FROM cuentas WHERE id_cpropia = '".$id_cuenta."'";
    $result1 = $conn->query($sql1);
    //echo $id_cuenta;
    $tabla = '<center>Resultado</center><br>
    <table class="table table-hover table-responsive-xl">
        <tbody>
        <form method="post" action="busca_cuenta.php">';
        while($row1 = $result1->fetch_assoc()) {
            $tabla .= '<tr>
                <th>Nombre</th>
                <td>'.$row1["Nombre"].' '.$row1["Apellido"].'</td>
                <th>Periodo</th>
                <td>'.$row1["fecha_periodo"].'</td>
            </tr>
            <tr>
                <th>Capital</th>
                <td>'.$row1["Capital"].'</td>
                <th>Interes</th>
                <td>'.$row1["interes"].'</td>
            </tr>
            <tr style="color:red;">
                <th><input type="hidden" id="id_cuenta" name="id_cuenta" value="'.$row1["id_cpropia"].'"></th>
                <th>TOTAL</th>
                <th>'.$row1["total_pagar"].'</th>
                <td><button type="submit" id="busca_cuenta" name="busca_cuenta" class="btn btn-success">Ver</button></td>
            </tr>
            </form>';
        }
    $tabla .= '</tbody>
    </table>';
}

$sql2 = "SELECT nombre,apellido,pago_total,Cuenta_de FROM transacciones ORDER BY id_transaccion DESC LIMIT 5";
    $result2 = $conn->query($sql2);

}

if($view=="andres"){
    $sql = "SELECT * FROM cuentas WHERE Cuenta_de=1";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM cuentas WHERE Cuenta_de=1";
    $result1 = $conn->query($sql1);
}
if($view=="tahis"){
    $sql = "SELECT * FROM cuentas WHERE Cuenta_de=2";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM cuentas WHERE Cuenta_de=2";
    $result1 = $conn->query($sql1);
}
if($view=="sociedad"){
    $sql = "SELECT * FROM cuentas WHERE Cuenta_de=3";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM cuentas WHERE Cuenta_de=3";
    $result1 = $conn->query($sql1);
}
if($view=="maya"){
    $sql = "SELECT * FROM cuentas WHERE Cuenta_de=4";
    $result = $conn->query($sql);

    $sql1 = "SELECT * FROM cuentas WHERE Cuenta_de=4";
    $result1 = $conn->query($sql1);
}

if($view=="ver_cuenta"){
    $sql = "SELECT * FROM transacciones WHERE id_cuenta = $id_cuenta ORDER BY id_transaccion DESC";
    $result = $conn->query($sql);

    $sql1 = "SELECT Nombre,Apellido FROM cuentas WHERE id_cpropia = $id_cuenta";
    $result1 = $conn->query($sql1);

    while($row1 = $result1->fetch_assoc()) {
        $nombre = $row1["Nombre"];
        $apellido = $row1["Apellido"];
    }
}