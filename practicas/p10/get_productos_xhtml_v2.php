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
	<script>
		function show() {
			// se obtiene el id de la fila donde está el botón presinado
			var rowId = event.target.parentNode.parentNode.id;
			// se obtienen los datos de la fila en forma de arreglo
			var data = document.getElementById(rowId).querySelectorAll(".row_data");
			/**
			querySelectorAll() devuelve una lista de elementos (NodeList) que 
			coinciden con el grupo de selectores CSS indicados.
			(ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

			En este caso se obtienen todos los datos de la fila con el id encontrado
			y que pertenecen a la clase "row-data".
			*/

			var nombre = data[0].innerHTML;
			var marca = data[1].innerHTML;
			var modelo = data[2].innerHTML;
			var precio = data[3].innerHTML;
			var unidades = data[4].innerHTML;
			var detalles = data[5].innerHTML;
			var imagen = data[6].firstChild.getAttribute('src');
			//var marca = data[1].innerHTML;

			alert("ID:"+rowId+"\nNombre: " + nombre + "\nMarca: " + marca + "\nModelo: " + modelo);

			send2form(rowId, nombre, marca, modelo, precio, unidades, detalles, imagen);
		}
	</script>
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
			<th scope="col">Editar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			//print_r($data);
			foreach($data as $row) {            // Se recorren tuplas
			?>
				<tr id=<?= $row['id']?> >
                <th scope="row"><?= $row['id']?></th>
				<td class="row_data"><?= $row['nombre'] ?></td>
				<td class="row_data"><?= $row['marca'] ?></td>
				<td class="row_data"><?= $row['modelo'] ?></td>
				<td class="row_data"><?= $row['precio'] ?></td>
				<td class="row_data"><?= $row['unidades'] ?></td>
				<td class="row_data"><?= utf8_encode($row['detalles']) ?></td>
				<td class="row_data"><img src=<?= $row['imagen'] ?> ></td>
				<td><input type="button" 
                            value="Editar" 
                            onclick="show()" /></td>
			 	</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<script>
		function send2form(id, nombre, marca, modelo, precio, unidades, detalles, imagen) {
		//	/*
			var form = document.createElement("form");

			var idIn = document.createElement("input");
			idIn.type = 'number';
			idIn.name = 'idE';
			idIn.value = id;
			form.appendChild(idIn);

			var nombreIn = document.createElement("input");
			nombreIn.type = 'text';
			nombreIn.name = 'nombreE';
			nombreIn.value = nombre;
			form.appendChild(nombreIn);

			var marcaIn = document.createElement("p");
			//marcaIn.type = 'text';
			marcaIn.name = 'marcaE';
			marcaIn.value = marca;
			form.appendChild(marcaIn);

			var modeloIn = document.createElement("input");
			modeloIn.type = 'text';
			modeloIn.name = 'modeloE';
			modeloIn.value = modelo;
			form.appendChild(modeloIn);

			var precioIn = document.createElement("input");
			precioIn.type = 'number';
			precioIn.name = 'precioE';
			precioIn.value = precio;
			form.appendChild(precioIn);

			var unidadesIn = document.createElement("input");
			unidadesIn.type = 'number';
			unidadesIn.name = 'unidadesE';
			unidadesIn.value = unidades;
			form.appendChild(unidadesIn);

			var detallesIn = document.createElement("input");
			//detallesIn.type = 'text';
			detallesIn.name = 'detallesE';
			detallesIn.value = detalles;
			form.appendChild(detallesIn);

			var imagenIn = document.createElement("input");
			imagenIn.type = 'text';
			imagenIn.name = 'imagenE';
			imagenIn.value = imagen;
			form.appendChild(imagenIn);

			console.log(form);

			form.method = 'POST';
			form.action = 'http://localhost/tecweb/practicas/p10/formulario_productos_v2_html.php';  

			document.body.appendChild(form);
			form.submit();
		//	*/
			/*var urlForm = "http://localhost/tecweb/practicas/p10/formulario_productos_v2_html.php";
			var propName = "nombre="+nombre;
			var propMarca = "marca="+marca;
			var propModelo = "modelo="+modelo;
			var propPrecio = "precio="+precio;
			var propUnidades = "unidades="+unidades;
			var propDetalles = "detalles="+detalles;
			var propImagen = "imagen="+imagen;
			window.open(urlForm+"?"+propName+"&"+propMarca +"&"+propModelo +"&"+propPrecio+"&"+propUnidades+"&"+propDetalles+"&"+propImagen);
			*/
		}
	</script>
</body>   
</html>