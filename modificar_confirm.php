<?php
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $alumno = $_POST["alumno"];
    $profesor = $_POST["profesor"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $asunto = $_POST["asunto"];

    $conexion = new mysqli("localhost", "root", "", "tutorias");
    $consulta = "UPDATE tutoria SET alumno = '$alumno', profesor = '$profesor', dia = '$dia', hora = '$hora', asunto = '$asunto' WHERE id = $id";

    if ($conexion->query($consulta)) {
        echo "Tutoría modificada con éxito.";
    } else {
        echo "Error: " . $conexion->error;
    }
    $conexion->close();
}
?>
<?php
$content = ob_get_clean();
include 'layout.php';
