// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
  };


function Validado(nombre, marca, modelo, precio, detalles, unidades){
var validado = true;
//nombre = document.getElementById('form-name').value;
if (nombre === "" || nombre.length > 100){
    alert('El nombre es un campo obligatorio y debe tener menos de 100 caracteres');
    validado = false;
} 


//marca = document.getElementById('form-marcaselect').value;
if ( marca == "Default"){
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
    alert ("El precio es un campo obligatorio y debe ser mayor o igual a 250");
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

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

function buscarProducto(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE LA CADENA DEL NOMBRE, MARCA O DETALLES A BUSCAR COINCIDENCIAS
    var cad = document.getElementById('searchString').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');

            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                
                //INICIALIZA LA TABLA CON ID "productos"
                document.getElementById("productos").innerHTML = '';

                //PARA CADA RESULTADO OBTENIDO EN LA CONSULTA
                Object.values(productos).forEach(element => {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                    if (Object.values(element) == '' ){
                        alert("No se encontraron coincidencias");
                    } else {
                    let descripcion = '';
                    descripcion += '<li>precio: '+element.precio+'</li>';
                    descripcion += '<li>unidades: '+element.unidades+'</li>';
                    descripcion += '<li>modelo: '+element.modelo+'</li>';
                    descripcion += '<li>marca: '+element.marca+'</li>';
                    descripcion += '<li>detalles: '+element.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';
                    template += `
                        <tr>
                            <td>${element.id}</td>
                            <td>${element.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    document.getElementById("productos").innerHTML = document.getElementById("productos").innerHTML + template;
                    }
                })
                
            }
        }
    };
    client.send("cad="+cad);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);

    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    var valido= Validado(finalJSON.nombre, finalJSON.marca, finalJSON.modelo, finalJSON.precio, finalJSON.detalles, finalJSON.unidades);

    if (valido) {
        //alert("Los campos son válidos para inserción");
        // SE OBTIENE EL STRING DEL JSON FINAL
        productoJsonString = JSON.stringify(finalJSON,null,2);

        // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            if (client.readyState == 4 && client.status == 200) {
                alert(client.responseText);
                if (client.responseText == 'Producto insertado'){
                    baseJSON.precio = 0.0;
                    baseJSON.modelo= "XX000";
                    baseJSON.unidades = 1;
                    baseJSON.detalles = "NA";
                    baseJSON.marca = "NA";
                    baseJSON.imagen = "img/imagen.png";
                    
                    document.getElementById('name').value = '';
                    init();
                }
                

            }
        };
        client.send(productoJsonString);
    } else {
        alert("ERROR al validar");
    }
    
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}