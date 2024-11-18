<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: sinPermisos.php");
    exit();
}

$username = $_SESSION['username'];
$horaActual = date("H:i:s");
$mensaje = "¡Bienvenido!";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenida</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="welcome-container">
        <h1>¡Hola, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>La hora actual es: <strong><?php echo $horaActual; ?></strong></p>
        <p><?php echo $mensaje; ?></p>
        <a href="cerrarSesion.php" class="logout-btn">Cerrar sesión</a>
    </div>
</body>
</html>