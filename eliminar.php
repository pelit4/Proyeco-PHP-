<?php
// Inicia el contenido de la página
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $confirmacion = strtolower($_POST["confirmacion"]);

    if ($confirmacion === 's') {
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "tutorias");
        if ($conexion->connect_error) {
            die("<div class='message error'>Error de conexión: " . $conexion->connect_error . "</div>");
        }

        // Eliminar todas las tutorías
        $consulta = "DELETE FROM tutoria";
        if ($conexion->query($consulta)) {
            $registrosEliminados = $conexion->affected_rows;
            echo "<div class='message success'>Se han eliminado $registrosEliminados tutorías.</div>";
        } else {
            echo "<div class='message error'>Error: " . $conexion->error . "</div>";
        }
        $conexion->close();
    } else {
        echo "<div class='message error'>No se eliminaron las tutorías.</div>";
    }
}
?>

<h1>Eliminar Todas las Tutorías</h1>
<form method="POST" action="">
    <label>¿Está seguro que desea eliminar todas las tutorías? (S/N):</label>
    <input type="text" name="confirmacion" maxlength="1" placeholder="S o N" required>
    <button type="submit">Confirmar</button>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
