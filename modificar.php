<?php
// Inicia el contenido de la página
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "tutorias");
    if ($conexion->connect_error) {
        die("<div class='message error'>Error de conexión: " . $conexion->connect_error . "</div>");
    }

    // Buscar tutoría por ID
    $consulta = "SELECT * FROM tutoria WHERE id = $id";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        ?>
        <h1>Modificar Tutoría</h1>
        <form method="POST" action="modificar_confirm.php">
            <label>ID:</label>
            <input type="text" name="id" value="<?php echo $fila['id']; ?>" readonly>
            
            <label>Nombre del Alumno:</label>
            <input type="text" name="alumno" value="<?php echo $fila['alumno']; ?>" required>
            
            <label>Profesor:</label>
            <input type="text" name="profesor" value="<?php echo $fila['profesor']; ?>" required>
            
            <label>Día:</label>
            <input type="text" name="dia" value="<?php echo $fila['dia']; ?>" required>
            
            <label>Hora:</label>
            <input type="time" name="hora" value="<?php echo $fila['hora']; ?>" required>
            
            <label>Asunto:</label>
            <textarea name="asunto" required><?php echo $fila['asunto']; ?></textarea>
            
            <button type="submit">Modificar Tutoría</button>
        </form>
        <?php
    } else {
        echo "<div class='message error'>No se encontró una tutoría con el ID $id.</div>";
    }
    $conexion->close();
}
?>

<h1>Buscar Tutoría para Modificar</h1>
<form method="POST" action="">
    <label>ID de la Tutoría:</label>
    <input type="number" name="id" placeholder="Introduce el ID de la tutoría" required>
    <button type="submit">Buscar Tutoría</button>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
