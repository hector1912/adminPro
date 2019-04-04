<?php
	require_once '../config/conexion.php';
  require_once 'Modelos/consultas.php';
  
	$conec=new conexion();
	$con=$conec->conectar();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- <title>SB Admin 2 - Dashboard</title> -->

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
      </a>
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

     
     <!-- Nav Item - Inicio -->
     <li class="nav-item">
        <a class="nav-link" href="Index.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Nav Item -  empleados -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Empleados</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Empleados:</h6>
            <a class="collapse-item" href="Agg_empleado.php">Agregar Empleados</a>
            <a class="collapse-item" href="listar_empleados.php">Listar Empleados</a>
          </div>
        </div>
      </li>

 <!-- Nav Item - Proyecto -->
 <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Proyectos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proyectos</h6>
            <a class="collapse-item" href="Agg_proyecto.php">Agregar Proyecto</a>
            <a class="collapse-item" href="Asignar_proy.php">Asignar Poyecto</a>
            <a class="collapse-item" href="listar_proyectos.php">Listar Proyectos</a>
            <a class="collapse-item" href="listar_proyectosasig.php">Proyectos Asignados</a>

          </div>
        </div>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Asignar Proyectos</h1>
              </div>
              <form class="user" action="Modelos/insert_asigproy.php" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <select class="form-control" id="proyect" name="proyect">
	                    	<option value="0">--Seleccionar Proyecto--</option>
	                    	<?php
		                    	$Proy=new Allconsultas();
								          $lista=$Proy->consultProyD($con);
								          foreach($lista['items'] as $item) {
									        echo "<option value=".$item['idP'].">".$item['nombre']."</option>";	
								          } 
	                    	?>
	                    </select>
                  </div>
                  <div class="col-sm-6">
                  <select class="form-control" id="empl" name="empl">
	                    	<option value="0">--Seleccionar Empleado--</option>
	                    	<?php
		                    	$Emp=new Allconsultas();
								          $lista=$Emp->consultEmp($con);
								          foreach($lista['items'] as $item) {
									        echo "<option value=".$item['idEmp'].">".$item['nombre'].$item['apellido']."</option>";	
								          } 
	                    	?>
	                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  </div>
                  <div class="col-sm-6">
                  <input type="text" class="form-control" id="fecha" name="fecha" placeholder="dd/mm/YYY" required="true">
                  </div>
                </div>
                <div class="form-group row">
                	<div class="col-sm-6 mb-3 mb-sm-0">
                  
              		</div>
              		<div class="col-sm-6">
                  <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                  	</div>
                </div>
                
                <hr>
              </form>
            </div>
        </div> 

         

     <!-- Bootstrap core JavaScript-->
     <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
