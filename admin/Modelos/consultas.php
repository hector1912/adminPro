<?php
	class Allconsultas
	{		
		function consultallProy($con)
		{
			$Proy=array();
			$Proy['items']=array();

			$query = "SELECT (id_tarea)as code,(tr.nombre)as nombre,(fecha_creacion)as fecha
			,(et.nombre)as estado FROM tarea tr
			inner join estadotarea et
			on tr.id_estadot=et.id_estadot
			";			
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Proy['items'], array(
						'idP'=>$row['code'],
						'nombre'=>$row['nombre'],
						'fecha'=>$row['fecha'],
						'estado'=>$row['estado']
					));
			    }
			    return $Proy;
			}
		}
		function consultEmp($con)
		{
			$Emp=array();
			$Emp['items']=array();

			$query = "SELECT (id_personal)as code,(per.nombre)as nombre, (apellido)as apellido
			, (telefono)as telefono, (direccion)as direccion, (correo)as correo,
			 (cg.nombre)as cargo FROM personal per
			 inner join cargo cg
			 on per.id_cargo=cg.id_cargo
			 ";			
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Emp['items'], array(
						'idEmp'=>$row['code'],
						'nombre'=>$row['nombre'],
						'apellido'=>$row['apellido'],
						'telefono'=>$row['telefono'],
						'direccion'=>$row['direccion'],
						'correo'=>$row['correo'],
						'cargo'=>$row['cargo']
					));
			    }
			    return $Emp;
			}
		}
		function consultCargo($con)
		{
			$Cargo=array();
			$Cargo['items']=array();

			$query = "SELECT (id_cargo)as code,(nombre)as cargos FROM cargo";			
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Cargo['items'], array(
						'idC'=>$row['code'],
						'nombre'=>$row['cargos']
					));
			    }
			    return $Cargo;
			}
		}
		function consultEstado($con)
		{
			$Estado=array();
			$Estado['items']=array();

			$query = "SELECT (id_estadot)as code,(nombre)as estado FROM estadotarea";			
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Estado['items'], array(
						'idE'=>$row['code'],
						'nombre'=>$row['estado']
					));
			    }
			    return $Estado;
			}
		}
		function consultProyD($con)
		{
			$Proy=array();
			$Proy['items']=array();

			$query = "SELECT (id_tarea)as code,(nombre)as nombre FROM tarea where id_estadot='1'";			
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Proy['items'], array(
						'idP'=>$row['code'],
						'nombre'=>$row['nombre']
					));
			    }
			    return $Proy;
			}
		}
		function consultProyAsig($con)
		{
			$Proy=array();
			$Proy['items']=array();

			$query = "SELECT (id_tasignada)as code,(fecha_inicio)as fecha,(fecha_fin)as fechaf
			,(emp.nombre)as empleado,(tr.nombre)as tarea FROM tasignada ta
			inner join personal emp
			on ta.id_personal=emp.id_personal
			inner join tarea tr
			on ta.id_tarea=tr.id_tarea
			";			
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Proy['items'], array(
						'idP'=>$row['code'],
						'fecha'=>$row['fecha'],
						'fechaf'=>$row['fechaf'],
						'empleado'=>$row['empleado'],
						'tarea'=>$row['tarea']
					));
			    }
			    return $Proy;
			}
		}
	}
?>