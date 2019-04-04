<?php
	require_once '../../config/conexion.php';
	$conec=new conexion();
	$con=$conec->conectar();

	$proyect=$_POST['proyect'];
	$emp=$_POST['empl'];
	$fecha=$_POST['fecha'];

	$f=explode('/',$fecha);
	$fe=$f[2]."-".$f[1]."-".$f[0]."-";
	$sql = "INSERT INTO tasignada (fecha_inicio,id_personal,id_tarea) values('$fe','$emp','$proyect')";
	$sql1 = "UPDATE tarea SET id_estadot = '2' where id_tarea='$proyect'";
	$result = mysqli_query($con,$sql) or die("Error de conexion, Contacte al administrador de sistemas");
	$result1 = mysqli_query($con,$sql1) or die("Error de conexion, Contacte al administrador de sistemas");
?>
<script type="text/javascript">
	window.location="../listar_proyectosasig.php";
</script>