<?php
include("../baseurl.php"); 
session_start();
if($_SESSION["control"]!=1){
  header("Location: ".$baseurl);
}
$view="susu";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Principal | AMG! System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/all.min.css">
  <script src="../fonts/all.js"></script>
  <link rel="stylesheet" href="../css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../css/jqvmap.min.css">
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <link rel="stylesheet" href="../css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../css/daterangepicker.css">
  <link rel="stylesheet" href="../css/summernote-bs4.css">
  <link rel="icon" type="image/png" href="../img/logo.png" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../scripts/jquery.min.js"></script>
  <script src="../scripts/jquery-ui.min.js"></script>
  <script src="../scripts/summernote-bs4.min.js"></script>
  <script src="../scripts/jquery.overlayScrollbars.min.js"></script>
  <script src="../scripts/adminlte.js"></script>
  <script src="../scripts/dashboard.js"></script>
  <script src="../scripts/demo.js"></script>
  <script src="../scripts/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="../img/logo.png" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- BARRA SUPERIOR -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /FIN DE BARRA SUPERIOR -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MG! System</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Andrés Alexis</a>
        </div>
      </div>
      <?php include("barra.php");?>
    </div>
  </aside>
  <!-- CONTENIDO DE LA PAGINA -->
  <div class="content-wrapper">
    <div class="content-header">
    </div>
    <section class="content">
    <?php include("../contadores/susu.php");?>
    <?php include("consultas.php");?>
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
         
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#listado">Listado</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#depositar">Pago</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#retirar">Limpiar</button><br><br>
                <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target="#faltan">Faltan</button>
            <br>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-search-dollar"></i>
                  Listado de pagos
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table class="table table-hover table-responsive-xl" style="text-align:center;">
                <thead>
                  <th>#</th>
                  <th>Persona</th>
                  <th>Pago</th>
                </thead>
                <tbody>
                <?php
                    while($row = $result->fetch_assoc()) {
                    if($row["pago"]=="0.00"){
                        $pago = "<b style='color:red;'>".$row["pago"]."</b>";
                    }
                    else{
                        $pago = "<b style='color:green;'>".$row["pago"]."</b>";
                    }
                    echo "<tr>
                      <td>".$row["id_susu"]."</td>
                      <td>".$row["persona"]."</td>
                      <td>".$pago."</td>
                    </tr>";
                    }
                    ?>
                </tbody>
              </table>
                  </select><br>
                </form>
                <hr>
              </div><!-- /.card-body -->
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
  <!-- Modal -->
<div class="modal fade" id="listado" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Listado de Susu <?php echo $ano;?></h4>
        </div>
        <div class="modal-body">
            <table class="table table-hover table-responsive-sm">
                <thead>
                    <th>Mes</th>
                    <th style="text-align:center;">15</th>
                    <th style="text-align:center;">30</th>
                </thead>
                <tbody>
                <?php
                    while($row1 = $result1->fetch_assoc()) {
                    if($row1["id_susutoca"]<$mes){
                        $persona1 = "<s style='color:red;'>".$row1["Q1"]."</s>";
                        $persona2 = "<s style='color:red;'>".$row1["Q2"]."</s>";
                    }
                    else{
                        $persona1 = $row1["Q1"];
                        $persona2 = $row1["Q2"];
                    }
                    echo "<tr>
                      <th>".$row1["mes"]."</th>
                      <td style='text-align:center;'>".$persona1."</td>
                      <td style='text-align:center;'>".$persona2."</td>
                    </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" >Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!--FIN DE MODAL -->
<!-- Modal -->
<div class="modal fade" id="depositar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="post" action="enviar.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pago de susu</h4>
        </div>
        <div class="modal-body">
         <center>Formulario de Pago</center><br>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <select id="persona" name="persona" class="form-control" required>
                    <option disabled selected>Seleccione una persona</option>
                    <?php
                     while($row2 = $result2->fetch_assoc()) {
                        echo "<option value='".$row2["id_susu"]."'>".$row2["persona"]."</option>";
                     }
                    ?>
              </select>
            </div>
            
          </div>
          </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal" >Cerrar</button>
          <button type="submit" class="btn btn-success" id="pagar_susu" name="pagar_susu">Enviar Pago</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!--FIN DE MODAL -->
  <!-- Modal -->
<div class="modal fade" id="retirar" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <form method="post" action="enviar.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Limpiar Susu Entregado</h4>
        </div>
        <div class="modal-body">
         <center><h3>¿Seguro que desea limpiar el susu?</h3></center><br>
          </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal" >Cerrar</button>
          <button type="submit" class="btn btn-success" id="limpiar" name="limpiar">Limpiar</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- FIN DE MODAL -->

  <div class="modal fade" id="faltan" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="post" action="enviar.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Faltan por Pagar</h4>
        </div>
        <div class="modal-body">
         <center>Lista que faltan por pagar</center><br>
         <table class="table table-hover">
                <thead>
                    <th>Nombre</th>
                    <th style="text-align:center;">Estado</th>
                </thead>
                <tbody>
                <?php
                    while($row3 = $result3->fetch_assoc()) {
                    echo "<tr>
                      <th>".$row3["persona"]."</th>
                      <td style='text-align:center;color:red;'><b>0.00</b></td>
                    </tr>";
                    }
                ?>
                </tbody>
            </table>
          </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" >Cerrar</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!--FIN DE MODAL -->
 <?php include("../footer.php");?>
</div>
</body>
</html>