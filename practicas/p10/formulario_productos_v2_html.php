<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro de productos</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
  </head>

  <body>

    <script type="text/javascript">
      function ctrlCaracteres(){
        var validado = true;
        nombre = document.getElementById('form-name').value;
        if (nombre === "" || nombre.length > 100){
          alert('El nombre es un campo obligatorio y debe tener menos de 100 caracteres');
          validado = false;
        } 

        
        marca = document.getElementById('form-marcaselect').value;
        if ( marca == "Default"){
          alert("Seleccione una marca");
          validado = false;
        }

        var alfnum = /^[a-zA-Z0-9]+$/;
        modelo = document.getElementById('form-modelo').value;   
        if( modelo.length > 25 || modelo === "" || !alfnum.test(modelo)){
          alert("El modelo no debe exceder de 25 caracteres, es un campo obligatorio y sólo debe contener valores alfanuméricos");
          validado = false;
        }

        precio = document.getElementById('form-precio').value;
        if ( precio === "" || precio < 99.99) {
          alert ("El precio es un campo obligatorio y debe ser mayor o igual a 250");
          validado = false;
        }

        detalles = document.getElementById('form-detalles').value;
        if (detalles.length > 250){
          alert("Los detalles no deben a exceder los 250 caracteres");
          validado = false;
        } 

        unidades = document.getElementById('form-unidades').value;
        if ( unidades === "" || unidades < 0) {
          alert ("Las unidades son un campo obligatorio y debe ser mayor o igual a 0");
          validado = false;
        }

        imagen = document.getElementById('form-imagen').value;
        if ( imagen === "" ){
          document.getElementById('form-imagen').value = "img/imagen.png";
          validado = false;
        }

        return validado;
      }
    </script>
    <h1>Registro de productos en MARKETZONE</h1>

    <p>Ingresa los datos que se solicitan</p>

    <form id="formularioProducto" action="update_producto.php" method="post">
    

      <fieldset>
        <legend><b>Información del producto</b></legend>

        <ul>
          <li><label for="form-id">Id </label><input type='text' name='idp' id="form-id" required value="<?= !empty($_POST['idE'])?$_POST['idE']:$_GET['idE'] ?>" readonly="readonly"> </li>
          <li><label for="form-name">Nombre </label><input type='text' name='nombrep' id="form-name" required value="<?= !empty($_POST['nombreE'])?$_POST['nombreE']:$_GET['nombreE'] ?>"></li>
          <li><label for="form-marca">Marca </label> 
            <select name="marcap" id="form-marcaselect" size="1">
              <option value="Default">Seleccione una marca</option>
              <option value="CANSON" <?= ( !empty($_POST['modeloE']) ? $_POST['modeloE'] : $_GET['modeloE']) == 'CANSON' ? 'selected' : ''; ?>>CANSON</option>
              <option value="MOLESKINE" <?= ( !empty($_POST['modeloE']) ? $_POST['modeloE'] : $_GET['modeloE'])== 'MOLESKINE' ? 'selected' : ''; ?>>MOLESKINE</option>
              <option value="Faber-Castell" <?= ( !empty($_POST['modeloE']) ? $_POST['modeloE'] : $_GET['modeloE']) == 'Faber-Castell' ? 'selected' : ''; ?>>Faber-Castell</option>
              <option value="Stabilo" <?= ( !empty($_POST['modeloE']) ? $_POST['modeloE'] : $_GET['modeloE']) == 'Stabilo' ? 'selected' : ''; ?>>Stabilo</option>
              <option value="Prismacolor" <?= ( !empty($_POST['modeloE']) ? $_POST['modeloE'] : $_GET['modeloE']) == 'Prismacolor' ? 'selected' : ''; ?>>Prismacolor</option>
              <option value="Genérico" <?= ( !empty($_POST['modeloE']) ? $_POST['modeloE'] : $_GET['modeloE']) == 'Genérico' ? 'selected' : ''; ?>>Genérico</option>
            </select>
          <li><label for="form-modelo">Modelo </label> <input type="text" name="modelop" id="form-modelo" required value="<?= !empty($_POST['modeloE'])?$_POST['modeloE']:$_GET['modeloE'] ?>"></li>
          <li><label for="form-precio">Precio </label> <input type="number" name="preciop" id="form-precio" required value="<?= !empty($_POST['precioE'])?$_POST['precioE']:$_GET['precioE'] ?>"></li>
          <li><label for="form-detalles">Detalles </label><input type='text' name="detallesp" id="form-detalles" value="<?= !empty($_POST['detallesE'])?$_POST['detallesE']:$_GET['detallesE'] ?>"></li>
          <li><label for="form-unidades">Unidades </label><input type="number" name="unidadesp" id="form-unidades" required value="<?= !empty($_POST['unidadesE'])?$_POST['unidadesE']:$_GET['unidadesE'] ?>"></li>
          <li><label for="form-imagen">Imagen </label><input type='text'name="imagenp" id="form-imagen" value="<?= !empty($_POST['imagenE'])?$_POST['imagenE']:$_GET['imagenE'] ?>"></li>
        </ul>
      </fieldset>
      <p>
        <input type="submit" value="Subir" >
        <input type="reset">
      </p>

    </form>

    <script type="text/javascript">
      document.getElementById("formularioProducto").addEventListener("submit", function(event) {
        
        if (!ctrlCaracteres()) { // Si no se pudieron verificar los datos
          event.preventDefault(); // Detiene el envío
        }
      });
    </script>
  </body>
</html>