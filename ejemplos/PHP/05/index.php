<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Pagina.php';

        $pag = new Pagina('El rincón del programador',
        'El sótano del programador');

        for($i=0; $i<15; $i++){
            $pag->insertar_cuerpo('Prueba #'.($i+1).' que debe aparecer en la página');
        }

        $pag->graficar();
    ?>
</body>
</html>