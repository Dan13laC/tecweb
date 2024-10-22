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

  //Agregar productos
  $('#product-form').submit(function(e){
    e.preventDefault();
    //console.log('Submiting');
    let desc = $('#description').val();
    var finalJSON = JSON.parse(desc);
    //finalJSON['nombre'] = $('#name').val();
    
    const postData = {
      nombre: $('#name').val(),
      precio: finalJSON.precio,
      unidades: finalJSON.unidades,
      modelo: finalJSON.modelo,
      marca: finalJSON.marca,
      detalles: finalJSON.detalles,
      imagen: finalJSON.imagen
    };
    
    //console.log(postData);
    //e.preventDefault();
    $.post('./backend/product-add.php', postData, function(response){
      fetchProducts();
      console.log(response);
      $('#product-form').trigger('reset');

    });
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
    $.post('')
  })  
});

