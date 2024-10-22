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
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
    // SE LISTAN TODOS LOS PRODUCTOS
    
}

$(document).ready(function(){
  $('#product-result').hide();

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

});

