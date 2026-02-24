<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>

</head>
<body>
    <h1>Calculadora de Índice de Masa Corporal (IMC)</h1>
    <form method="post" action="">
        <label for="peso">Peso (kg):</label>
        <input type="number" step="0.1" name="peso" id="peso" required><br><br>
        <label for="altura">Altura (m):</label>
        <input type="number" step="0.01" name="altura" id="altura" required><br><br>
        <input type="submit" value="Calcular IMC">
    </form>

    <?php
    if (
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_POST['peso'], $_POST['altura'])
    ) {
        $peso = floatval($_POST['peso']);
        $altura = floatval($_POST['altura']);

        if ($altura > 0) {
            $imc = $peso / ($altura * $altura);
            $imcFormateado = number_format($imc, 2);

            echo "<div class=\"resultado\">Su IMC es ";
            echo $imcFormateado;
            echo "</div>";

            if ($imc < 18.5) {
                echo "<div class=\"resultado\">Estado: Bajo peso</div>";
            } elseif ($imc < 25) {
                echo "<div class=\"resultado\">Estado: Normal</div>";
            } elseif ($imc < 30) {
                echo "<div class=\"resultado\">Estado: Sobrepeso</div>";
            } else {
                echo "<div class=\"resultado\">Estado: Obesidad</div>";
            }
        }
    }
    ?>
</body>
</html>
