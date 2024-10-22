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
      console.log(response);
      $('#product-form').trigger('reset');
    });
    
  });

});

