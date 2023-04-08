<?php
if(isset($_REQUEST["iniciar"])){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $mi_user = "andres.morales";
    $mi_pass = "28952895";

    if(($usuario==$mi_user)&&($password==$mi_pass)){
        session_start();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["control"] = 1;
        header("Location: menu.php");
    }
    else{
        ?>
        <script>
            Swal.fire(
            'Oops...',
            'Credenciales Invalida',
            'error'
            )
        </script>
        <?php
    }
}
