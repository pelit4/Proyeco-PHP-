<?php
// Inicia el contenido de la página
ob_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "tutorias");
if ($conexion->connect_error) {
    die("<div class='message error'>Error de conexión: " . $conexion->connect_error . "</div>");
}

// Obtener el próximo ID disponible
$consulta = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'tutorias' AND TABLE_NAME = 'tutoria'";
$resultado = $conexion->query($consulta);
$fila = $resultado->fetch_assoc();
$proximoID = $fila['AUTO_INCREMENT'];

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumno = $_POST["alumno"];
    $profesor = $_POST["profesor"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $asunto = $_POST["asunto"];

    if (empty($alumno)) {
        echo "<div class='message error'>El nombre del alumno es obligatorio.</div>";
    } else {
        $consulta = "INSERT INTO tutoria (alumno, profesor, dia, hora, asunto) VALUES ('$alumno', '$profesor', '$dia', '$hora', '$asunto')";
        if ($conexion->query($consulta)) {
            echo "<div class='message success'>Tutoría añadida con éxito. El ID asignado es: " . $conexion->insert_id . "</div>";
        } else {
            echo "<div class='message error'>Error: " . $conexion->error . "</div>";
        }
    }
}
$conexion->close();
?>

<h1>Añadir Tutoría</h1>
<form method="POST" action="">
    <label>ID (Asignado automáticamente):</label>
    <input type="text" name="id" value="<?php echo $proximoID; ?>" readonly>
    
    <label>Nombre del Alumno:</label>
    <input type="text" name="alumno" placeholder="Introduce el nombre del alumno" required>
    
    <label>Profesor:</label>
    <select name="profesor">
        <option value="Miguel Angel">Miguel Angel</option>
        <option value="Juan">Juan</option>
        <option value="Maria">Maria</option>
    </select>
    
    <label>Día:</label>
    <select name="dia">
        <option value="lunes">Lunes</option>
        <option value="martes">Martes</option>
        <option value="jueves">Jueves</option>
    </select>
    
    <label>Hora:</label>
    <input type="time" name="hora" required>
    
    <label>Asunto:</label>
    <textarea name="asunto" placeholder="Describe el asunto" required></textarea>
    
    <button type="submit">Añadir Tutoría</button>
</form>

<?php
// Captura el contenido y lo pasa a layout.php
$content = ob_get_clean();
include 'layout.php';
