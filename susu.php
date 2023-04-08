<?php
include("baseurl.php"); 
include("conexion/bd.php");
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
  <title>Susu | AMG! System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="fonts/css/all.min.css">
  <script src="fonts/js/all.js"></script>
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/select2-bootstrap4.min.css">
 


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
    <?php include("contadores/susu.php");?>
    <?php include("src/consultas_susu.php");?>
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
                  <th style="width:500px;">Persona</th>
                  <th style="width:500px;">Pago</th>
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
            <table class="table table-hover table-responsive-xl">
                <thead>
                    <th style="width:500px;">Mes</th>
                    <th style="text-align:center;width:500px;">15</th>
                    <th style="text-align:center;width:500px;">30</th>
                </thead>
                <tbody>
                <?php
                    while($row1 = $result1->fetch_assoc()) {
                    if($row1["id_susutoca"]<$mes){
                        $persona1 = "<s style='color:red;'>".$row1["Q1"]."</s>";
                        $persona2 = "<s style='color:red;'>".$row1["Q2"]."</s>";                        
                    }
                    elseif ($row1["id_susutoca"]==$mes) {
                      #Mes actual
                      if($dia <= 15){
                        /*No se ha entregado susu, no se tacha ninguno*/
                        $persona1 = $row1["Q1"];
                        $persona2 = $row1["Q2"];
                      }
                      else{
                        /*Dia mayor que quincena = segunda quincena*/
                        $persona1 = "<s style='color:red;'>".$row1["Q1"]."</s>";
                        $persona2 = $row1["Q2"];
                      }
                    }
                    else{
                        #Meses mayores al actual no llegado
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
          <button type="button" class="btn btn-info btn-block" data-dismiss="modal" >Cerrar</button>
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
            <div class="form-group col-12">
              <div class="form-group">
                  <label>Personas</label>
                  <select class="select2" multiple="multiple" id="persona" name="persona[]" data-placeholder="Seleccione Personas" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php
                     while($row2 = $result2->fetch_assoc()) {
                        echo "<option value='".$row2["id_susu"]."'>".$row2["persona"]."</option>";
                     }
                    ?>
                  </select>
                </div>
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
 <?php include("footer.php");?>
</div>
<script src="scripts/jquery.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/jquery.overlayScrollbars.min.js"></script>
  <script src="scripts/adminlte.js"></script>
  <script src="scripts/demo.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
   <!-- Select2 -->
   <script src="scripts/select2.full.min.js"></script>
   <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
   
  });
</script>
</body>
</html>