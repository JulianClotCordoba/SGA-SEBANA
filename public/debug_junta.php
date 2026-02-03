<?php
// public/debug_junta.php

define('BASE_PATH', dirname(__DIR__));
require_once BASE_PATH . '/app/config/config.php';

// Simple PDO connection
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

echo "<h1>Junta Directiva Debug</h1>";

echo "<h2>Raw Table Content</h2>";
$stmt = $pdo->query("SELECT * FROM junta_directiva");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($rows)) {
    echo "<p>Table is empty.</p>";
} else {
    echo "<table border='1' cellpadding='5'>";
    echo "<thead><tr>";
    foreach (array_keys($rows[0]) as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";
    foreach ($rows as $row) {
        echo "<tr>";
        foreach ($row as $key => $cell) {
            // Highlight 'estado'
            $style = ($key === 'estado') ? "style='background-color: yellow; font-weight: bold;'" : "";
            echo "<td $style>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
}

echo "<h2>Affiliates Check</h2>";
$stmt2 = $pdo->query("SELECT id, nombre_completo FROM afiliados LIMIT 10");
$afiliados = $stmt2->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($afiliados);
echo "</pre>";
