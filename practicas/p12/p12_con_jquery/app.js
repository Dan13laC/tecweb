// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    
    // SE LISTAN TODOS LOS PRODUCTOS
    
}

$(document).ready(function(){
  let edit =false;
  var JsonString = JSON.stringify(baseJSON,null,2);
  fetchProducts();
  $('#description').val(JsonString);
  $('#product-result').hide();

  //búsqueda
  $('#search').keyup(function(){
    if ( $('#search').val() ){
      let search = $('#search').val();
      console.log(search);
      $.ajax({
        url: './backend/product-search.php',
        data: { search }, 
        type: 'GET',
        success: function (response) {
          //console.log(response);
          let productos = JSON.parse(response);
          console.log(productos); 
          let template = '';
 
          productos.forEach(producto => {
            template += `
                <li>${producto.nombre}</li>`;
          });

          $('#product-result').show();
          $('#container').html(template); 
                    
        }
      })
    }
     
  });

  function Validado(nombre, marca, modelo, precio, detalles, unidades){
    var validado = true;
    //nombre = document.getElementById('form-name').value;
    if (nombre === "" || nombre.length > 100){
        alert('El nombre es un campo obligatorio y debe tener menos de 100 caracteres');
        validado = false;
    } 
    
    
    //marca = document.getElementById('form-marcaselect').value;
    if ( marca === "" || modelo.length > 25){
        alert("Seleccione una marca");
        validado = false;
    }
    
    var alfnum = /^[a-zA-Z0-9]+$/;
    //modelo = document.getElementById('form-modelo').value;   
    if( modelo.length > 25 || modelo === "" || !alfnum.test(modelo)){
        alert("El modelo no debe exceder de 25 caracteres, es un campo obligatorio y sólo debe contener valores alfanuméricos");
        validado = false;
    }
    
    //precio = document.getElementById('form-precio').value;
    if ( precio === "" || precio < 99.99) {
        alert ("El precio es un campo obligatorio y debe ser mayor a 99.99");
        validado = false;
    }
    
    //detalles = document.getElementById('form-detalles').value;
    if (detalles.length > 250){
        alert("Los detalles no deben a exceder los 250 caracteres");
        validado = false;
    } 
    
    //unidades = document.getElementById('form-unidades').value;
    if ( unidades === "" || unidades < 0) {
        alert ("Las unidades son un campo obligatorio y debe ser mayor o igual a 0");
        validado = false;
    }
    
    //imagen = document.getElementById('form-imagen').value;
    /*
    if ( imagen === "" ){
        document.getElementById('form-imagen').value = "img/imagen.png";
        validado = false;
    }
    */
    return validado;
    }

  //Agregar/Editar productos
  $('#product-form').submit(function(e){
    e.preventDefault();
    //console.log('Submiting');
    let desc = $('#description').val();
    var finalJSON = JSON.parse(desc);
    //finalJSON['nombre'] = $('#name').val();
    
    const postData = {
      id: $('#productId').val(),
      nombre: $('#name').val(),
      precio: finalJSON.precio,
      unidades: finalJSON.unidades,
      modelo: finalJSON.modelo,
      marca: finalJSON.marca,
      detalles: finalJSON.detalles,
      imagen: finalJSON.imagen
    };

    //alert(JSON.stringify(postData,null,2));
    //nombre, marca, modelo, precio, detalles, unidades
    var valido = Validado (postData.nombre, postData.marca, postData.modelo, postData.precio, postData.detalles, postData.unidades);
    if (valido) {
      let url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
      
      //console.log(postData);
      //e.preventDefault();
      $.post( url, postData, function(response){
        fetchProducts();
        //console.log(response);
        $('#product-form').trigger('reset');
        //var JsonString = JSON.stringify(baseJSON,null,2);
        $('#description').val(JSON.stringify(baseJSON,null,2));
        alert(response);
      });
    } else {
      alert("Hay campos no válidos para inserción");
    }
    
    
  });

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
  //Eliminar productos
  $(document).on('click', '.product-delete', function(){
   if(confirm('Are yo sure you want to delete it?')){
    let element  = $(this)[0].parentElement.parentElement;
    //console.log(element);
    let id = $(element).attr('prodID');
    //console.log(id);
    $.post('./backend/product-delete.php', {id}, function (response){
      //console.log(response);
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
      console.log(product.nombre);
      $('#name').val(product.nombre);
      var jsonfinal = {
        "precio": Number(product.precio),
        "unidades": Number(product.unidades),
        "modelo": product.modelo,
        "marca": product.marca,
        "detalles": product.detalles,
        "imagen": product.imagen
      };
      $('#productId').val(product.id);
      $('#description').val(JSON.stringify(jsonfinal,null,2));
      edit = true;
    })
  })  
});

