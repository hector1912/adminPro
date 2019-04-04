<?php
	require_once '../../config/conexion.php';
	$conec=new conexion();
	$con=$conec->conectar();

	$nombre=$_POST['nombre'];
	$fecha=$_POST['fecha'];
	$estado=$_POST['estado'];

	$f=explode('/',$fecha);
	$fe=$f[2]."-".$f[1]."-".$f[0]."-";
	$sql = "INSERT INTO tarea (nombre,fecha_creacion,id_estadot) values('$nombre','$fe','$estado')";
	$result = mysqli_query($con, $sql) or die("Error de conexion, Contacte al administrador de sistemas");
?>
<script type="text/javascript">
	window.location="../Agg_proyecto.php";
</script>