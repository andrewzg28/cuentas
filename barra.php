<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="menu.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Menu Principal
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-hand-holding-usd"></i>
              <p>
                Control Cuentas
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-danger">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="andres.php" class="nav-link">
                <i class="fas fa-wallet"></i>
                  <p>Cuentas Andrés</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tahis.php" class="nav-link">
                <i class="fas fa-wallet"></i>
                  <p>Cuentas Tahis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sociedad.php" class="nav-link">
                <i class="fas fa-wallet"></i>
                  <p>Cuentas Sociedad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="maya.php" class="nav-link">
                <i class="fas fa-wallet"></i>
                  <p>Cuentas Maya</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ADICIONALES</li>
          <li class="nav-item has-treeview">
            <a href="susu.php" class="nav-link">
            <i class="fas fa-money-bill-wave"></i>
              <p>
                Susu
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link" onclick="salir();">
            <i class="fas fa-power-off"></i>
              <p>
                Salir
              </p>
            </a>
            <script>
              function salir(){
                Swal.fire({
                  title: '¿Seguro que desea salir?',
                  icon: 'question',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Sí, salir!', 
                  cancelButtonText: 'Cancelar'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "salir.php";
                  }
                })
              }
            </script>
          </li>
        </ul>
      </nav>