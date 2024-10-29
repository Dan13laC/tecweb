<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__.'/Tabla.php';

        $tab = new Tabla(2, 3, 'border: 1px solid');
        $tab -> cargar(0,0,'a');
        $tab -> cargar(0,1,'b');
        $tab -> cargar(0,2,'c');
        $tab -> cargar(1,0,'D');
        $tab -> cargar(1,1,'E');
        $tab -> cargar(1,2,'F');

        $tab->graficar();
    ?>
</body>
</html>