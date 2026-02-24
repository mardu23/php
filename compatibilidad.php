
<?php
$nombre1 = "";
$nombre2 = "";
$alias = "";
$porcentaje = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];

    $porcentaje += strlen($nombre1);
    $porcentaje += strlen($nombre2);

    if (str_contains(($nombre1), "a")) {
        $porcentaje += 15;
    }

    if (str_contains(($nombre2), "a")) {
        $porcentaje += 15;
    }

    $porcentaje += random_int(0, 30);

    if ($porcentaje > 100) {
        $porcentaje = 100;
    }

    $alias = substr($nombre1, 0, 2) . substr($nombre2, 0, 2);
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="css/COMPATIBILIDAD.CSS">
<head>
    <title>Compatibilidad</title>
</head>
<body>

<h2>Calcular Compatibilidad</h2>

<div class="contenedor">
<form method="POST">
    <p>Nombre de la/el chic@</p>
    <input type="text" name="nombre1" ><br><br>
    <p>Nombre de la/el chic@</p>
    <input type="text" name="nombre2" ><br><br>
    <button type="submit">Calcular</button>
</form>

<?php if ($alias != ""): ?>
    <h3>Resultados:</h3>
    <?php
    echo "Nombre 1: " . $nombre1 . "<br>";
    echo "Nombre 2: " . $nombre2 . "<br>";
    echo "Alias: " . $alias . "<br>";
    echo "Porcentaje: " . $porcentaje . "%";
    ?>
<?php endif; ?>
</div>
</body>
</html>