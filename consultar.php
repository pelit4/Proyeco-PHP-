<?php
// Inicia el contenido de la página
ob_start();

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumno = $_POST["alumno"];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "tutorias");
    if ($conexion->connect_error) {
        die("<div class='message error'>Error de conexión: " . $conexion->connect_error . "</div>");
    }

    // Consulta las tutorías del alumno
    $consulta = "SELECT * FROM tutoria WHERE alumno = '$alumno'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        echo "<h2>Tutorías de $alumno</h2>";
        echo "<table style='width: 100%; border-collapse: collapse;'>
                <thead>
                    <tr style='background-color: #007BFF; color: white;'>
                        <th style='padding: 10px; border: 1px solid #ddd;'>ID</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Profesor</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Día</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Hora</th>
                        <th style='padding: 10px; border: 1px solid #ddd;'>Asunto</th>
                    </tr>
                </thead>
                <tbody>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td style='padding: 10px; border: 1px solid #ddd;'>{$fila['id']}</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>{$fila['profesor']}</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>{$fila['dia']}</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>{$fila['hora']}</td>
                    <td style='padding: 10px; border: 1px solid #ddd;'>{$fila['asunto']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='message error'>No hay tutorías para el alumno $alumno.</div>";
    }
    $conexion->close();
}
?>

<h1>Consultar Tutorías</h1>
<form method="POST" action="">
    <label>Nombre del Alumno:</label>
    <input type="text" name="alumno" placeholder="Introduce el nombre del alumno" required>
    <button type="submit">Consultar Tutorías</button>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
