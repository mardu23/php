<?php
$frase = "";
$resultados = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['frase'])) {
    $frase = $_POST['frase'];

    if (trim($frase) !== "") {
        $fraseLower = strtolower($frase);
        
        $cantidadPalabras = str_word_count($frase);
        $bonusEstandar = 0;
        
        if (str_contains($fraseLower, "éxito")) {
            $bonusEstandar += 15;
        }
        if (str_contains($fraseLower, "meta")) {
            $bonusEstandar += 15;
        }
        if (str_contains($fraseLower, "sueños")) {
            $bonusEstandar += 15;
        }
        
        $numeroAleatorio = random_int(0, 20);

        $nivelCursi = $cantidadPalabras + $bonusEstandar;
        $palabrasCursi = ["amor", "cariño", "sueño"];
        foreach ($palabrasCursi as $palabra) {
            if (str_contains($fraseLower, $palabra)) {
                $nivelCursi += 20;
            }
        }
        $nivelCursi += $numeroAleatorio;

        $nivelCringe = $cantidadPalabras + $bonusEstandar;
        $palabrasCringe = ["lol", "uwu", "xd"];
        foreach ($palabrasCringe as $palabra) {
            if (str_contains($fraseLower, $palabra)) {
                $nivelCringe += 20;
            }
        }
        $nivelCringe += $numeroAleatorio;

        $nivelRandom = $cantidadPalabras + $bonusEstandar;
        $palabrasRandom = ["lol", "random", "loca"];
        foreach ($palabrasRandom as $palabra) {
            if (str_contains($fraseLower, $palabra)) {
                $nivelRandom += 20;
            }
        }
        $nivelRandom += $numeroAleatorio;

        $resultados = [
            'frase' => $frase,
            'cringe' => $nivelCringe,
            'cursi' => $nivelCursi,
            'random' => $nivelRandom
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Cursi</title>

</head>
<body>
    <h1>Calculadora de Nivel Cursi</h1>
    <form method="post" action="">
        <label for="frase">Ingresa tu frase:</label><br><br>
        <textarea name="frase" id="frase" required></textarea><br><br>
        <input type="submit" value="Calcular Nivel Cursi">
    </form>

    <?php if ($resultados): ?>
        <div class="resultado">
            <p><strong>Frase:</strong> <?php echo htmlspecialchars($resultados['frase']); ?></p>
            <div class="nivel"><strong>Nivel Cringe:</strong> <?php echo $resultados['cringe']; ?></div>
            <div class="nivel"><strong>Nivel Cursi:</strong> <?php echo $resultados['cursi']; ?></div>
            <div class="nivel"><strong>Nivel Random:</strong> <?php echo $resultados['random']; ?></div>
        </div>
    <?php endif; ?>
</body>
</html>