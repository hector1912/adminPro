<?php
	require_once '../../config/conexion.php';
	$conec=new conexion();
	$con=$conec->conectar();

	$nombre=$_POST['nombre'];
	$apellido=$_POST['apell'];
	$telefono=$_POST['tel'];
	$direccion=$_POST['direcc'];
	$email=$_POST['email'];
	$cargo=$_POST['carg'];

	$sql = "INSERT INTO personal (nombre,apellido,telefono,direccion,correo,id_cargo) values('$nombre','$apellido','$telefono','$direccion','$email','$cargo')";
	$result = mysqli_query($con, $sql) or die("Error de conexion, Contacte al administrador de sistemas");
?>
<script type="text/javascript">
	window.location="../listar_empleados.php";
</script>