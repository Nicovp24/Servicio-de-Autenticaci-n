<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: bienvenida.php");
    exit();
}

$usuarios = [
    "admin" => "1234",
    "usuario" => "abcd"
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: bienvenida.php");
        exit();
    } else {
        header("Location: sinPermisos.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>
        <p><?php echo $error; ?></p>
    </div>
</body>
</html>