<style>
    body {
        background-color: #d6faea;
        margin: 0 10%;
        font-family: "Times New Roman", Times, serif;
    }
    h1 {
        text-align: center;
        font-family: serif;
        font-weight: normal;
        text-transform: uppercase;
        border-bottom: 1.2px solid #742eba;
        margin-top: 30px;
        }
        h2 {
        color: #742eba;
        font-size: 1em;
    }
</style>

<h1>MUCHAS GRACIAS</h1>
<p>Gracias por entrar al concurso de Tenis Mike "Chidos mis tenis". Hemos recibido la siguiente información de tu registro:</p>
<?php
//echo"<h1>MUCHAS GRACIAS</h1>";
//echo '<p>Gracias por entrar al concurso de Tenis Mike "Chidos mis tenis". Hemos recibido la siguiebte información de tu registro:</p>';
echo '<h2><n>Acerca de ti:</n></h2>';
echo '<ul>';
echo "<li>Nombre: ".$_GET['name'].'</li>';
echo "<li>E-mail: ".$_GET['email'].'</li>';
echo "<li>Teléfono: ".$_GET['phonenumber'].'</li>';
echo '</ul>';
echo '<p>Tu triste historia: </p>'.$_GET['reason'];
echo '<h2><n>Tu diseño de tenis (Si ganas):</n></h2>';
echo '<ul>';
echo "<li>Color: <i>".$_GET['color'].'</i></li>';
echo "<li>Tamaño: <i>".$_GET['size'].'</i></li>';

echo '</ul>';
?>