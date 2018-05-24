<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ejemplo MVC</title>
</head>
<body>
	<h1>Ingreso de estudiante</h1>
	<form action="index.php?controlador=estudiantes&action=agregar" method="post" >
		<label for="nombre">Nombre: </label>
		<input type="text" name="nombres" id="nombre" autofocus="" required><br>

		<label for="apellidos">Apellidos </label>
		<input type="text" name="apellidos" id="apellidos" required><br>

		<label for = "pago_mes">Pago por mes</label>
		<input type="number" name="pago" min="0" max="200" required><br>

		<label for = "carrera"> Carrera </label>
		<select name="carrera" name="carrera" required>
				<option value="1">Tecnico en Sistemas informaticos</option>
				<option value="2">Doctorado</option>
		</select><br>
		<input type="submit" class="btn btn-primary" name="agregar">
	</form>

	<h1>Listado de Estudiante</h1>
		<table>
				<tr>
					<td>ID</td>
					<td>Nombre</td>	
					<td>Apellido</td>
					<td>Carrera</td>
					<td>Pago de carreara</td>
					<td>Acciones</td>
					<?php $acum =0?>
				</tr>
				<tr>
					<?php

						$duration1 = $valor1->duration;
						$duration2 = $valor2->duration;
						$nombree1 = $valor1->nombre;
						$nombree2 = $valor2->nombre;
						foreach($estudiante as $valor){ 
							$variable;
							
							if($valor->id_carreras == 1){
								$variable = $nombree1;
								$pagoIndividual= $valor->pago_mes * 8 * $duration1;
							} else if($valor->id_carreras == 2){
								$variable = $nombree2;
								$pagoIndividual= $valor->pago_mes * 8 * $duration2;
							}

							$acum = $acum + $pagoIndividual;
							?>
							
						<tr>
							<td><?=$valor->id ;?></td>
							<td><?=$valor->nombres ;?></td>
							<td><?=$valor->apellidos ;?></td>
							<td><?=$variable;?></td>
							<td><?=$pagoIndividual?></td>
							<td>
								<button onclick="location.href='index.php?controlador=estudiantes&action=modificar&id=<?=$valor->id?>'">Modificar</button>
								<button onclick="location.href='index.php?controlador=estudiantes&action=eliminar&id=<?=$valor->id?>'">Eliminar</button>
							</td>
						</tr>
					
						<?php }
					?>
				</tr>
		</table>
	<center><h3>Pago Total</h3>
		<?=$acum ?>
	</center>
</body>
</html>

		


	