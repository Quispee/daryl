<?php
function obtenerFechasPorDigito($digito) {
    $fechas = [
        '0' => ['2025-06-01', '2025-06-15', '2025-06-30'],
        '1' => ['2025-06-02', '2025-06-16', '2025-07-01'],
        '2' => ['2025-06-03', '2025-06-17', '2025-07-02'],
        '3' => ['2025-06-04', '2025-06-18', '2025-07-03'],
        '4' => ['2025-06-05', '2025-06-19', '2025-07-04'],
        '5' => ['2025-06-06', '2025-06-20', '2025-07-05'],
        '6' => ['2025-06-07', '2025-06-21', '2025-07-06'],
        '7' => ['2025-06-08', '2025-06-22', '2025-07-07'],
        '8' => ['2025-06-09', '2025-06-23', '2025-07-08'],
        '9' => ['2025-06-10', '2025-06-24', '2025-07-09'],
    ];
    return $fechas[$digito] ?? [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = trim($_POST["dni"]);

    if (strlen($dni) !== 9 || !ctype_digit($dni)) {
        echo "Error: El DNI debe tener exactamente 9 caracteres numéricos.";
        exit;
    }

    $ultimoDigito = substr($dni, -1);
    $fechas = obtenerFechasPorDigito($ultimoDigito);
    sort($fechas);

    echo "<h3>Fechas de solicitud según tu DNI ($dni):</h3><ul>";
    foreach ($fechas as $fecha) {
        echo "<li>$fecha</li>";
    }
    echo "</ul>";

    if ($ultimoDigito === '7') {
        echo "<p><strong>Tu solicitud tiene prioridad.</strong></p>";
    }
}
?>
