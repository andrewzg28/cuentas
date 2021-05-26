<?php
include("baseurl.php"); 
session_start();
if($_SESSION["control"]!=1){
  header("Location: ".$baseurl);
}
$view="andres";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Principal | AMG! System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/all.min.css">
  <script src="fonts/all.js"></script>
  <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="css/jqvmap.min.css">
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="css/daterangepicker.css">
  <link rel="stylesheet" href="css/summernote-bs4.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/summernote-bs4.min.js"></script>
  <script src="scripts/jquery.overlayScrollbars.min.js"></script>
  <script src="scripts/adminlte.js"></script>
  <script src="scripts/dashboard.js"></script>
  <script src="scripts/demo.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="img/logo.png" />
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
      <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MG! System</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
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
    <?php include("contadores/andres.php");?>
    <?php include("src/consulta.php");?>
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
          <form method="post" action="busca_cuenta.php">
            <div class="col-lg-4">
                <select class="form-control" id="id_cuenta" name="id_cuenta" required>
                    <option disabled selected>Seleccione una Cuenta</option>
                    <?php 
                    while($row1 = $result1->fetch_assoc()) {
                    echo "<option value='".$row1["id_cpropia"]."'>".$row1["Nombre"]." ".$row1["Apellido"]."</option>";
                    }
                    ?> 
                </select>
                <button class="btn btn-primary" type="submit" id="busca_cuenta" name="busca_cuenta">Ver Cuenta</button>
            </div><br>
        </form>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-search-dollar"></i>
                  Buscador de Cuentas
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover table-responsive-xl" style="text-align:center;">
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Capital</th>
                        <th>Interes</th>
                        <th>Total a Pagar</th>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = $result->fetch_assoc()) { 
                            echo "<tr>
                                <td>".$row["id_cpropia"]."</td>
                                <td>".$row["Nombre"]." ".$row["Apellido"]."</td>
                                <td>".$row["fecha_periodo"]."</td>
                                <td>$".$row["Capital"]."</td>
                                <td>$".$row["interes"]."</td>
                                <th style='color:red;'>$".$row["total_pagar"]."</th>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
 <?php include("footer.php");?>
</div>
</body>
</html>