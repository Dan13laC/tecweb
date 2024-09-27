function getDatos(){
    var nombre = window.prompt("Nombre: ","")
    var edad = prompt("Edad: ","");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+ nombre + '</h3>';
    
    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+ edad + '</h3>';
}

function holaMundo(){
    var div1 = document.getElementById('textojs01');
    div1.innerHTML = '<p>Hola mundo</p>';
}

function impPorDef(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;
    
    var div1 = document.getElementById('nombrejs02');
    div1.innerHTML = '<p>'+ nombre + '</p>';
    
    var div2 = document.getElementById('edadjs02');
    div2.innerHTML = '<p>'+ edad + '</p>';
    
    var div3 = document.getElementById('alturajs02');
    div3.innerHTML = '<p>'+ altura + '</p>';
    
    var div4 = document.getElementById('casadojs02');
    div4.innerHTML = '<p>'+ casado + '</p>';
}
    

function impPorIng(){
    var nombre;
    var edad;
    nombre = prompt('Ingresa tu nombre:', '');
    edad = prompt('Ingresa tu edad:', '');
    var div1 = document.getElementById('respjs02');
    div1.innerHTML = '<p>Hola '+nombre+' así que tienes '+edad+' años'+'</p>';
}

function sumaMult(){
    var valor1;
    var valor2;
    valor1 = prompt('Introducir primer número:', '');
    valor2 = prompt('Introducir segundo número', '');
    var suma = parseInt(valor1)+parseInt(valor2);
    var producto = parseInt(valor1)*parseInt(valor2);

    var div1 = document.getElementById('sumajs03');
    div1.innerHTML = '<p>La suma es '+suma+'</p>';
    
    var div2 = document.getElementById('multiplicacionjs03');
    div2.innerHTML = '<p>El producto es '+producto+'</p>';
}

function cond(){
    var nombre;
    var nota;
    nombre = prompt('Ingresa tu nombre:', '');
    nota = prompt('Ingresa tu nota:', '');

    if (nota>=4) {
        var div1 = document.getElementById('califjs03');
        div1.innerHTML = '<p>'+ nombre +' está aprobado con un '+nota +'</p>';
    }
}

function condifelse(){
    var num1,num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    var div1 = document.getElementById('mayorjs03');
    
    if (num1>num2) {
        div1.innerHTML = '<p>el mayor es '+ num1 + '</p>';    }
    else {
        div1.innerHTML = '<p>el mayor es '+ num2 + '</p>';
    }
}

function condifanidado(){
    var nota1,nota2,nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var div1 = document.getElementById('estpromjs03');
        
    var pro;
    pro = (nota1+nota2+nota3)/3;
    if (pro>=7) {
        div1.innerHTML = '<p>aprobado</p>';
    } else {
        if (pro>=4) {
            div1.innerHTML = '<p>regular</p>';
        } else {
            div1.innerHTML = '<p>reprobado</p>';
        }
    }
}

function casevalor(){
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '' );
    //Convertimos a entero
    valor = parseInt(valor);
    
    var div1 = document.getElementById('valorjs03');
    

    switch (valor) {
        case 1: div1.innerHTML = '<p>uno</p>';
        break;

        case 2: div1.innerHTML = '<p>dos</p>';
        break;

        case 3: div1.innerHTML = '<p>tres</p>';
        break;

        case 4: div1.innerHTML = '<p>cuatro</p>';
        break;

        case 5: div1.innerHTML = '<p>cinco</p>';
        break;

        default:div1.innerHTML = '<p>debe ingresar un valor comprendido entre 1 y 5.</p>';
    }
}


function casecolor(){
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)' , '' );
    switch (col) {
        case 'rojo': document.bgColor='#ff0000';
        break;

        case 'verde': document.bgColor='#00ff00';
        break;

        case 'azul': document.bgColor='#0000ff';
        break;
    }
}