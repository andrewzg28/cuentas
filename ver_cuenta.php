<?php
include("baseurl.php"); 
session_start();
$id_cuenta = $_SESSION["id_cuenta"];
$view="ver_cuenta";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Menu Principal | AMG! System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="fonts/css/all.min.css">
  <script src="fonts/js/all.js"></script>
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
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
    <?php include("contadores/cuenta.php");?>
    <?php include("src/consulta.php");?>
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
          <button class="btn btn-success" data-toggle="modal" data-target="#listado">Realizar Pago</button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#limpiar">Cancelar Cuenta</button><br><br>
            <div class="card">
              <div class="card-header bg-dark">
                <h3 class="card-title ">
                  <i class="fas fa-search-dollar"></i>
                  Historial de <b><?php echo $nombre." ".$apellido;?></b>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover table-responsive-xl" style="text-align:center; font-size:small;">
                    <thead>
                        <th style="width:100px;">#</th>
                        <th style="width:100px;">Fecha</th>
                        <th style="width:100px;">Anterior</th>
                        <th style="width:100px;">Pagado</th>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = $result->fetch_assoc()) { 
                            echo "<tr>
                                <td>".$row["id_transaccion"]."</td>
                                <td>".$row["fecha_pago"]."</td>
                                <td>$".$row["capital"]."</td>
                                <th style='color:#337ec8;'>$".$row["pago_total"]."</th>
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
 <!-- Modal -->
<div class="modal fade" id="listado" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="post" action="pagar.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pago de Cuenta</h4>
        </div>
        <div class="modal-body">
        Debe Capital: <b><?php echo $capital;?></b><br>
        Debe Interes: <b><?php echo $interes;?></b><br>
        <b style="color:red;">TOTAL: <?php echo number_format($total_final, 2, '.', '');?></b>
        <hr>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
              <input type="text" class="form-control" id="p_capital" name="p_capital" placeholder="Pago de Capital" required>
            </div>
          </div>
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
              </div>
              <input type="text" class="form-control" id="p_interes" name="p_interes" placeholder="Pago de Interes" required>
            </div>
          </div>
        </div> <!--FIN DE BODY-->
        <input type="hidden" id="capital_actual" name="capital_actual" value="<?php echo $capital;?>">
        <input type="hidden" id="interes_actual" name="interes_actual" value="<?php echo $interes;?>">
        <input type="hidden" id="id_cuenta" name="id_cuenta" value="<?php echo $id_cuenta;?>">
        <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre;?>">
        <input type="hidden" id="apellido" name="apellido" value="<?php echo $apellido;?>">
        <input type="hidden" id="id_prestamista" name="id_prestamista" value="<?php echo $id_prestamista;?>">
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal" >Cerrar</button>
          <button type="submit" class="btn btn-success" id="pago_cuenta" name="pago_cuenta">Realizar Pago</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- FIN DE MODAL -->

   <!-- Modal -->
<div class="modal fade" id="limpiar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form method="post" action="pagar.php">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pago de Cuenta</h4>
        </div>
        <div class="modal-body">
        Debe Capital: <b><?php echo $capital;?></b><br>
        Debe Interes: <b><?php echo $interes;?></b><br>
        <b style="color:red;">TOTAL: <?php echo number_format($total_final, 2, '.', '');?></b>
        <input type="hidden" id="id_cuenta" name="id_cuenta" value="<?php echo $id_cuenta;?>">
        <hr>
         <?php 
         if($total_final!=0){
           echo "Esta cuenta a sido cancelada en su totalidad, se debe limpiar toda transacción de esta cuenta.<br>";
           echo "<button type='submit' id='limpiar_cuenta' name='limpiar_cuenta' class='btn btn-primary'>Limpiar Cuenta</button>";
         }
         else{
           echo "<button>".$nombre." ".$apellido." </button>aun debe <b style='color:red;'>".$total_final."</b>, esta cuenta no puede ser cancelada en su totalidad";
         }
         ?>
        </div> <!--FIN DE BODY-->
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" >Cerrar</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- FIN DE MODAL -->
 <?php include("footer.php");?>
</div>
</body>
<script src="scripts/jquery.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/jquery.overlayScrollbars.min.js"></script>
  <script src="scripts/adminlte.js"></script>
  <script src="scripts/demo.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
</html>