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

function ciclowhile(){
    var x;
    x=1;
    var div1 = document.getElementById('whilejs04');
    while (x<=100) {
        div1.innerHTML = div1.innerHTML+'<p>'+x+'</p>';
        x=x+1;
    }
}

function whilesuma(){
    var x=1;
    var suma=0;
    var valor;
    var div1 = document.getElementById('while2js04');
    while (x<=5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma+valor;
        x = x+1;
    }
    div1.innerHTML = '<p>La suma de los valores es '+suma+'</p>';
}

function dowhile(){
    var valor;
    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);

        var div1 = document.getElementById('dowhilejs04');
        div1.innerHTML = div1.innerHTML+'<p>El valor '+valor+' tiene</p>';
        if (valor<10)
            div1.innerHTML= div1.innerHTML+'<p>Tiene 1 dígitos </p>';
        else{
            if (valor<100) {
                div1.innerHTML=div1.innerHTML+'<p>Tiene 2 dígitos </p>';
            }
            else {
                div1.innerHTML=div1.innerHTML+'<p>Tiene 3 dígitos </p>';
            }
        }
    }while(valor!=0);
}

function iterativofor(){
    var f;
    var div1 = document.getElementById('forjs04');
    for(f=1; f<=10; f++){
        div1.innerHTML = div1.innerHTML + f + " ";
    }
}

function repeticion(){
    var div1 = document.getElementById('mensaje1js05');
    var div2 = document.getElementById('mensaje2js05');
    var div3 = document.getElementById('mensaje3js05');
    div1.innerHTML='<p>Cuidado<br>Ingresa tu documento correctamente</p>';
    div2.innerHTML='<p>Cuidado<br>Ingresa tu documento correctamente</p>';
    div3.innerHTML='<p>Cuidado<br>Ingresa tu documento correctamente</p>';
}

function funcion(){
    var div1 = document.getElementById('funcionjs05');

    function mostrarMensaje() {
        div1.innerHTML=div1.innerHTML+'<p>Cuidado<br>Ingresa tu documento correctamente</p>';
/*        document.write('Cuidado<br>');
        document.write('Ingresa tu documento correctamente<br>');
*/    }
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function rango(){
    var div1 = document.getElementById('rangojs05');
    div1.innerHTML="<p>";
    function mostrarRango(x1,x2) {
        var inicio;
        for(inicio=x1; inicio<=x2; inicio++) {
            div1.innerHTML= div1.innerHTML + inicio + ' ';
//            document.write(inicio+' ');
        
        }
    }
    div1.innerHTML= div1.innerHTML +"</p>";
    
    var valor1,valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}

function convc1(){
    function convertirCastellano(x) {
        if(x==1)
            return "uno";
        else
            if(x==2)  
                return "dos";
            else
                if(x==3)
                    return "tres";
                else
                    if(x==4)
                        return "cuatro";        
                    else
                        if(x==5)
                            return "cinco";
                        else
                            return "valor incorrecto";
    }
    var div1 = document.getElementById('convC1js05');
    
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    div1.innerHTML= '<p>'+r+'</p>';
    
}

function convc2(){
    function convertirCastellano(x) {
        switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
        }    
    }
    var div1 = document.getElementById('convC2js05');
    
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    div1.innerHTML= '<p>'+r+'</p>';

}