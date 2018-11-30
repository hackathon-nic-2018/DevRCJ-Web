<?php
include("utilidades/conexion.php");
$nombre = $_SESSION['Username'];

$reservaciones = "select * from reservaciones";
$reservaciones2 = mysqli_query($con, $reservaciones);
$treservaciones = mysqli_num_rows($reservaciones2);

  ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="imagenes/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <b> <?php  echo $nombre; ?></b><br>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li>
          <a href="principal.php">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        <li>
          <a href="arrendadores.php">
            <i class="fa fa-users"></i> <span>Arrendadores</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue"><?php echo $treservaciones; ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="habitaciones.php">
            <i class="fa fa-bed"></i> <span>Habitaciones</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">6</small>
            </span>
          </a>
        </li>
        <li>
          <a href="reservaciones.php">
            <i class="fa fa-edit"></i> <span>Reservaciones</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">4</small>
            </span>
          </a>
        </li>
        <li>
          <a href="servicios.php">
            <i class="fa fa-gear"></i> <span>Servicios</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">5</small>
            </span>
          </a>
        </li>
        <li>
          <a href="sitio.php">
            <i class="fa fa-globe"></i> <span>Sitio</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">0</small>
            </span>
          </a>
        </li> 
         <li>
          <a href="administradores.php">
            <i class="fa fa-lock"></i> <span>Administrador</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">4</small>
            </span>
          </a>
        </li>
         <li>
          <a href="estadisticas.php">
            <i class="fa fa-line-chart"></i> <span>Estadisticas</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li>
          <a href="reportes.php">
            <i class="fa fa-file-pdf-o"></i> <span>Reportes</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="fa fa-power-off"></i> <span>Salir</span>
          </a>
        </li>
      
      </ul>
    </section>
  </aside>