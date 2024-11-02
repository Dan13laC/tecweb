<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herencia</title>
</head>
<body>
    <?php 
        require_once __DIR__.'/Operacion.php';

        $suma = new Suma;
        $suma->setValor1(10); //Método heredado, definido en la clase 'Operacion'
        $suma->setValor2(10); //Método heredado, definido en la clase 'Operacion'
        $suma->operar();      //Método definido en la clase 'Suma'

        echo 'El resultado es: '.$suma->getResultado().'<br>';

        $resta = new Resta;
        $resta->setValor1(10); //Método heredado, definido en la clase 'Operacion'
        $resta->setValor2(5); //Método heredado, definido en la clase 'Operacion'
        $resta->operar();      //Método definido en la clase 'Suma'

        echo 'El resultado es: '.$resta->getResultado().'<br>';
    ?>
</body>
</html>