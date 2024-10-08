<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda por tope</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	<?php
		//header("Content-Type: application/json; charset=utf-8"); 
		$data = array();

		if(isset($_GET['tope']))
		{
			$tope = $_GET['tope'];
		}
		else
		{
			die('Parámetro "tope" no detectado...');
		}

		if (!empty($tope))
		{
			/** SE CREA EL OBJETO DE CONEXION */
			@$link = new mysqli('localhost', 'root', 'Luca20*', 'marketzone');
			/** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

			/** comprobar la conexión */
			if ($link->connect_errno) 
			{
				die('Falló la conexión: '.$link->connect_error.'<br/>');
				//exit();
			}

			/** Crear una tabla que no devuelve un conjunto de resultados */
			if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope") ) 
			{
				/** Se extraen las tuplas obtenidas de la consulta */
				$row = $result->fetch_all(MYSQLI_ASSOC);

				/** Se crea un arreglo con la estructura deseada */
				foreach($row as $num => $registro) {            // Se recorren tuplas
					foreach($registro as $key => $value) {      // Se recorren campos
						$data[$num][$key] = utf8_encode($value);
					}
				}

				/** útil para liberar memoria asociada a un resultado con demasiada información */
				$result->free();
			}
		}
			$link->close();
			/** Se devuelven los datos en formato JSON */
	?>

<body>
    <h1>Productos</h1>
    <table class="table">
		<thead class="thead-dark">
			<tr>
			<th scope="col">#</th>
			<th scope="col">Nombre</th>
			<th scope="col">Marca</th>
			<th scope="col">Modelo</th>
			<th scope="col">Precio</th>
			<th scope="col">Unidades</th>
			<th scope="col">Detalles</th>
			<th scope="col">Imagen</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//print_r($data);
			foreach($data as $row) {            // Se recorren tuplas
			?>
				<tr>
                <th scope="row"><?= $row['id'] ?></th>
				<td><?= $row['nombre'] ?></td>
				<td><?= $row['marca'] ?></td>
				<td><?= $row['modelo'] ?></td>
				<td><?= $row['precio'] ?></td>
				<td><?= $row['unidades'] ?></td>
				<td><?= utf8_encode($row['detalles']) ?></td>
				<td><img src=<?= $row['imagen'] ?> ></td>
			 	</tr>
			<?php
			}
			?>
			
		</tbody>
	</table>

</body>   
</html>