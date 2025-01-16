<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tutorías</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .hero {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 50px 20px;
        }
        .hero h1 {
            font-size: 2.5em;
            margin: 0;
        }
        .hero p {
            font-size: 1.2em;
            margin-top: 10px;
        }
        .menu {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        .menu a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #f1f1f1;
            color: #666;
            font-size: 0.9em;
        }
        .footer a {
            text-decoration: none;
            color: #007BFF;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Bienvenido a la Gestión de Tutorías</h1>
        <p>Selecciona una opción para comenzar</p>
    </div>
    <div class="menu">
        <a href="añadir.php">Añadir Tutoría</a>
        <a href="consultar.php">Consultar Tutorías</a>
        <a href="modificar.php">Modificar Tutoría</a>
        <a href="eliminar.php">Eliminar Tutorías</a>
    </div>
    <div class="footer">
        <p>Desarrollado por <a href="#">Alejandro Martin Ramos</a> &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
</html>
