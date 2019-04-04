<?php
	class consultarProy
	{		
		function consultProy($con)
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
			    
			}
			return $Proy;
		}

		# sacar los proyectos asignados para el combo
		function comboProy($con)
		{
			$Proy=array();
			$Proy['items']=array();

			$query = "SELECT (tr.id_tarea)as code, (tr.nombre)as nombre FROM tarea tr
			inner join tasignada ta
			on tr.id_tarea=ta.id_tarea
			";
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Proy['items'], array(
							'idT'=>$row['code'],
							'nombre'=>$row['nombre']
					));
			    }			    
			}
			return $Proy;
		}

		# sacar los estados para el combo
		function comboEstados($con)
		{
			$Proy=array();
			$Proy['items']=array();

			$query = "SELECT (et.id_estadot)as code, (et.nombre)as nombre FROM estadotarea et";
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	array_push($Proy['items'], array(
							'idET'=>$row['code'],
							'nombret'=>$row['nombre']
					));
			    }			    
			}
			return $Proy;
		}
	}
?>