<!DOCTYPE html>
<html>
<head>
	<title>Modificar el producto</title>
	<meta charset="utf-8">
	<meta name ="viewport" content="width=device.width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<h1>Modificar</h1>
	<form action="index.php?controlador=estudiantes&action=modificar" method="post" >
		<input type="text" hidden name="modid" required=""  value="<?=$estudiante->id?>"><br>
		<label for="nombre">Nombre: </label>
		<input type="text" name="modnombres" id="nombre" required="" autofocus="" value="<?=$estudiante->nombres?>"><br>

		<label for="apellidos">Apellidos </label>
		<input type="text" name="modapellidos" id="apellidos" required="" value="<?=$estudiante->apellidos?>"><br>

		<label for = "pago_mes">Pago por mes</label>
		<input type="number" name="modpago" min="0" max="300" required="required" value="<?=$estudiante->pago_mes?>"><br>

		<label for="modcarrera"> Carrera </label>
		<select name="modcarrera">
			<option value="1">Tecnico en Sistemas informaticos</option>
			<option value="2">Doctorado</option>
		</select><br>
		<button type="submit" name="modificar">Modificar</button>
	</form>


</body>
</html>	