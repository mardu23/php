<?php
$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['fecha_nacimiento'])) {
    $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $_POST['fecha_nacimiento']);
    if ($fechaNacimiento) {
        $ahora = new DateTime();
        $intervalo = $fechaNacimiento->diff($ahora);
        $años = $intervalo->y;

        
        $vividos = $ahora->getTimestamp() - $fechaNacimiento->getTimestamp();
        if ($vividos < 0) {
            $vividos = 0;
        }
        $horasVividas = floor($vividos / 3600);
        $minutosVividos = floor($vividos / 60);
        $diasVividos = $intervalo->days;
        if ($diasVividos === false) { 
            $diasVividos = floor($vividos / 86400);
        }

        $resultado = "<p>Edad: <strong>{$años}</strong> años</p>";
        $resultado .= "<p>Días vividos (aprox.): <strong>{$diasVividos}</strong> días</p>";
        $resultado .= "<p>Horas vividas : <strong>{$horasVividas}</strong> horas</p>";
        $resultado .= "<p>Minutos vividos : <strong>{$minutosVividos}</strong> minutos</p>";
    } else {
        $resultado = '<p style="color:red;">Formato de fecha inválido.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de edad</title>
</head>
<body>
    <h1>Calculadora de Edad</h1>
    <form method="post" action="">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
 
    if ($resultado !== '') {
        echo $resultado;
    }
    ?>
</body>
</html>