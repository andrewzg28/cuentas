<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AM - System | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="fonts/css/all.min.css">
  <script src="fonts/js/all.js"></script>
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
  <link rel="icon" type="image/png" href="img/logo.png" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page" style="background-image: url('img/fondo.jpg');background-size:100% 100%;">
<div class="login-box">
  <div class="login-logo">
  <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8; width:22%;">
    <font color=white size=150><b></b> Systems</a></font>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="border-radius:500px;">
    <div class="card-body login-card-body" style="border-radius:30px;">
      <p class="login-box-msg">Iniciar Sesión</p>
      <?php include("src/consulta_login.php");?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" id="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float:right; padding: 8px 30px;" id="iniciar" name="iniciar">Entrar al Sistema <i class="fas fa-arrow-circle-right"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> <!--FIN DE LOGIN BOX-->
</body>
</html>
