<?php
include("baseurl.php"); 
session_start();
if($_SESSION["control"]!=1){
  header("Location: ".$baseurl);
}
$view="menu";
require("conexion/bd.php");
date_default_timezone_set("America/Panama");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Principal | AMG! System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="fonts/css/all.min.css">
  <link rel="stylesheet" href="css/jqvmap.min.css">
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- BARRA SUPERIOR -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
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
    <?php include("src/consulta.php");?>
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-7 connectedSortable">
          <button type="button" class="btn" style="background-color: #2871b9; color:white;" data-toggle="modal" data-target="#listado"><i class="fa-solid fa-plus"></i> Nuevo Prestamo</button><br><br>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-search-dollar"></i>
                  Buscador de Cuentas
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form method="post">
                <select class="form-control" id="id" name="id" required>
                    <option disabled selected>Seleccione una cuenta</option>
                    <?php
                    while($row = $result->fetch_assoc()) {
                      if($row["Cuenta_de"]==1){
                        $prestamista = "Andrés";
                      }
                      elseif($row["Cuenta_de"]==2){
                        $prestamista = "Tahis";
                      }
                      elseif($row["Cuenta_de"]==3){
                        $prestamista = "Sociedad";
                      }
                      elseif ($row["Cuenta_de"]==4) {
                        $prestamista = "Maya";
                      }
                    echo "<option value='".$row["id_cpropia"]."'>".$row["Nombre"]. " ". $row["Apellido"]. " - <b>(" . $prestamista. ")</option>";
                    }
                    ?>
                  </select><br>
                  <button class="btn btn-block" type="submit" id="btn_buscar" name="btn_buscar" style="background-color: #2871b9; color:white;"><i class="fas fa-search-dollar"></i> Buscar</button>
                </form>
                <hr>
                <?php echo $tabla;?>
              </div><!-- /.card-body -->
            </div>
          </section>
          <section class="col-lg-5 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-truck-moving"></i>
                  Ultimas 5 Transacciones
                </h3>
              </div>
              <div class="card-body">
                <table class="table table-responsive-xl table-hover">
                    <thead>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Prestamista</th>
                    </thead>
                    <tbody>
                     <?php
                     while($row2 = $result2->fetch_assoc()) { 
                      if($row2["Cuenta_de"]==1){
                        $prestamista = "Andrés";
                      }
                      elseif($row2["Cuenta_de"]==2){
                        $prestamista = "Tahis";
                      }
                      elseif($row2["Cuenta_de"]==3){
                        $prestamista = "Sociedad";
                      }
                      elseif ($row2["Cuenta_de"]==4) {
                        $prestamista = "Maya";
                      }       
                      echo "<tr>
                        <td>".$row2["nombre"]." ".$row2["apellido"]."</td>
                        <td>".$row2["pago_total"]."</td>
                        <td>".$prestamista."</td>
                      </tr>";
                    }
                     ?> 
                    </tbody>
                </table>
              </div>
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
      <form method="post" action="pagar.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Nuevo Prestamo</h4>
        </div>
        <div class="modal-body">
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la persona" required>
            </div>
          </div>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
              <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido de la persona" required>
            </div>
          </div>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
              <input type="text" class="form-control" id="capital" name="capital" placeholder="Capital a prestar" required>
            </div>
          </div>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
              <input type="text" class="form-control" id="interes" name="interes" placeholder="Interes del prestamo" required>
            </div>
          </div>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
             <select id="prestamista" name="prestamista" class="form-control" required>
                    <option value="1">Andrés</option>
                    <option value="2">Tahis</option>
                    <option value="3">Sociedad</option>
                    <option value="4">Maya</option>
             </select>
            </div>
          </div>
        </div> <!--FIN DE BODY-->
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal" >Cerrar</button>
          <button type="submit" class="btn btn-success" id="nuevo_prestamo" name="nuevo_prestamo">Generar nuevo prestamo</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- FIN DE MODAL -->
 <?php include("footer.php");?>
</div>
<script src="fonts/js/all.min.js"></script>
<script src="scripts/jquery.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/jquery.overlayScrollbars.min.js"></script>
  <script src="scripts/adminlte.js"></script>
  <script src="scripts/demo.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
</body>
</html>