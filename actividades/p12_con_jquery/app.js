function init (){
  fetchProducts();
  $('#details').val("");
  $('#product-result').hide();
  $('#name-status').text('');
  $('#brand-status').text('');
  $('#model-status').text('');
  $('#units-status').text('');
  $('#price-status').text('');
  $('#details-status').text('');
}

function fetchProducts(){
  $.ajax({
    url: './backend/product-list.php',
    type: 'GET',
    success: function (response) {
      //console.log(response);
      let productos = JSON.parse(response);
      let template = '';
      
      productos.forEach(producto => {
        template += `
          <tr prodID="${producto.id}">
              <td>${producto.id}</td>
              <td>
                <a href="#" class="product-item">${producto.nombre}</a>
              </td>
              <td>
                <ul>${producto.precio}</ul>
                <ul>${producto.unidades}</ul>
                <ul>${producto.modelo}</ul>
                <ul>${producto.marca}</ul>
                <ul>${producto.detalles}</ul>
              </td>
              <td>
                <button class="product-delete btn btn-danger">
                Delete
                </button>
              </td>
          </tr>`;
      });
      $('#products').html(template);
    }
  });
}

$(document).ready(function(){
  let edit =false;
  let idIns;
  let nameRepetead = false;
  let valid = false;
  let validName = false;
  let validBrand = false;
  let validModel = false;
  let validPrice = false;
  let validUnits = false;
  let validDetails = false;

  init();
  //búsqueda
  $('#search').keyup(function(){
    if ( $('#search').val() ){
      let search = $('#search').val();
      console.log(search);
      $.ajax({
        url: `./backend/product-search.php`,
        data: { search },
        type: 'GET',
        success: function (response) {
          let templateRes = '';
          let templateProd = '';
          const productos = JSON.parse(response);
          if(Object.keys(productos).length > 0){
            console.log(productos);
            productos.forEach(producto => {
              templateRes += `
                  <li>${producto.nombre}</li>`;
              templateProd += `
                <tr prodID="${producto.id}">
                  <td>${producto.id}</td>
                  <td>
                    <a href="#" class="product-item">${producto.nombre}</a>
                  </td>
                  <td>
                    <ul>${producto.precio}</ul>
                    <ul>${producto.unidades}</ul>
                    <ul>${producto.modelo}</ul>
                    <ul>${producto.marca}</ul>
                    <ul>${producto.detalles}</ul>
                  </td>
                  <td>
                    <button class="product-delete btn btn-danger">Delete</button>
                  </td>
                </tr>`;
            });
            console.log(templateProd);
            $('#product-result').show();
            $('#container').html(templateRes);
            $('#products').html(templateProd);
          }
        }
      })
    }
  });

  //Validacion de la existencia del producto por nombre
  $('#name').on('input', function(){
    if ( $('#name').val().trim() ){
      let nombre = $('#name').val().trim();
      //console.log(nombre);
      $.ajax({
        url: './backend/product-searchName.php',
        data: { nombre },
        type: 'GET',
        success: function (response) {
          const productos = JSON.parse(response);
          
          if(!$.isEmptyObject(productos)){
            //console.log('id redc: '+productos[0].id);
            //console.log('id de form: '+idIns);
            if((idIns==productos[0].id)){
              //console.log('Es el mismo producto que se está editando');
              nameRepetead=false;
            } else {
              //console.log('Diferentes productos');
              $('#name-status').text('El nombre ya existe en la base de datos');
              nameRepetead= true;
            }
          } else {
            nameRepetead= false;
            $('#name-status').text('');
          }
        }
      })
    }
  });

  //Funciones para la validación de los campos ingresados
  function validarNombre(){
    let name = $('#name').val();
    if (nameRepetead){ //Si el nombre está repetido, automáticamente devuelve falso
      //console.log('ValidarNombre: nombre repetido');
      return false;
    } else {
      if (name === "" || name.length > 100){
        //console.log('nombre no validado');
        $('#name-status').text('El nombre es un campo obligatorio y debe tener menos de 100 caracteres');
        return false;
      } else {
        //console.log('nombre validado');
        $('#name-status').text('');
        return true;
      }
    }
  }

  function validarMarca(){
    let marca = $('#brand').val();
    if (marca === "" || marca.length > 25){
      $('#brand-status').text('La marca es un campo obligatorio y debe tener menos de 25 caracteres');
      return false;
    } else {
      $('#brand-status').text('');
      return true;
    }
  }

  function validarModelo(){
    let modelo = $('#model').val();
    var alfnum = /^[a-zA-Z0-9]+$/;
    if( modelo.length > 25 || modelo === "" || !alfnum.test(modelo)){
      $('#model-status').text("El modelo no debe exceder de 25 caracteres, es un campo obligatorio y sólo debe contener valores alfanuméricos");
      return false;
    } else {
      $('#model-status').text('');
      return true;
    }
  }
  
  function validarUnidades(){
    let unidades = $('#units').val();
    if( unidades === "" || unidades < 0 ){
      $('#units-status').text("Las unidades son un campo obligatorio y debe ser mayor o igual a 0");
      return false;
    } else {
      $('#units-status').text('');
      return true;
    }
  }

  function validarPrecio(){
    let precio = $('#price').val();
    if( precio === "" || precio < 99.99 ){
      $('#price-status').text("El precio es un campo obligatorio y debe ser mayor a 99.00");
      return false;
    } else {
      $('#price-status').text('');
      return true;
    }
  }

  function validarDetalles(){
    let detalles = $('#details').val();
    if( detalles.length > 250 ){
      $('#details-status').text("Los detalles no deben exceder de 250 caracteres");
      return false;
    } else {
      $('#details-status').text('');
      return true;
    }
  }

  //Cuando cambia el foco de los campos
  $('#name').blur(function(){validName = validarNombre(); });
  $('#brand').blur(function(){validBrand = validarMarca(); });
  $('#model').blur(function(){validModel = validarModelo(); });
  $('#price').blur(function(){validPrice = validarPrecio(); });
  $('#units').blur(function(){validUnits = validarUnidades(); });
  $('#details').blur(function(){validDetails = validarDetalles(); });


  //Agregar/Editar productos
  $('#product-form').submit(function(e){
    e.preventDefault();

    const postData = {
      id: $('#productId').val(),
      nombre: $('#name').val(),
      precio: $('#price').val(),
      unidades: $('#units').val(),
      modelo: $('#model').val(),
      marca: $('#brand').val(),
      detalles: $('#details').val(),
      imagen: $('#image').val()||'img/imagen.png'
    };
    //alert(postData.id)
    validName = validarNombre();
    validBrand = validarMarca();
    validModel = validarModelo();
    validPrice = validarPrecio();
    validUnits = validarUnidades();
    validDetails = validarDetalles();
    //nombre, marca, modelo, precio, detalles, unidades
    valid = validName & validBrand & validModel & validPrice & validUnits & validDetails;
    //var valido = Validado (postData.nombre, postData.marca, postData.modelo, postData.precio, postData.detalles, postData.unidades);
    
    if (valid) {
      let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
      ///*
      $.post( url, postData, function(response){
        fetchProducts();
        $('#product-form').trigger('reset');
        console.log(response);
        alert(response);
      });
      validName = false;
      validBrand = false;
      validModel = false;
      validPrice = false;
      validUnits = false;
      validDetails = false;
    } else {
      alert("Hay campos no válidos para inserción");
    }
  });

  //Eliminar productos
  $(document).on('click', '.product-delete', function(){
    if(confirm('Are yo sure you want to delete it?')){
      let element  = $(this)[0].parentElement.parentElement;
      let id = $(element).attr('prodID');
      $.post('./backend/product-delete.php', {id}, function (response){
        fetchProducts();
        alert(response);
      })
    }
  });
  
//Editar producto
  $(document).on('click', '.product-item', function(){
    //console.log('editing');
    let element = $(this)[0].parentElement.parentElement;
    //console.log(element);
    let id = $(element).attr('prodID');
    //console.log(element+ ' '+id);
    $.post('./backend/product-single.php', {id}, function(response){
      console.log(response);
      const product = JSON.parse(response);
      //console.log(product.nombre);
      $('#name').val(product.nombre);
      $('#productId').val(product.id);
      $('#brand').val(product.marca);
      $('#model').val(product.modelo);
      $('#price').val(product.precio);
      $('#units').val(product.unidades);
      $('#details').val(product.detalles);
      $('#image').val(product.imagen);
      edit = true;
      idIns = $('#productId').val();
    })
  })
});

