<?php

session_start();

if(isset($_SESSION["usuario"]))
{
    header("Location: ../dashboard.php");
    exit();
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Inicio de Sesión</title>

    <link rel="stylesheet" href="../css/estilos.css">

</head>

<body>

<div class="login">

    <h1>BibliotecaWeb</h1>

    <h3>Inicio de Sesión</h3>

    <form action="validar.php" method="post">

        <label>Usuario</label>

        <input
            type="text"
            name="usuario"
            required>

        <label>Contraseña</label>

        <input
            type="password"
            name="clave"
            required>
            
        <label>Rol</label>

        <input
            type="rol"
            name="rol"
            required>

        <button type="submit">
            Iniciar sesión
        </button>

    </form>

    <?php

    if(isset($_GET["error"]))
    {
        echo "<p style='color:red'>
                Usuario o contraseña incorrectos.
              </p>";
    }

    ?>

</div>

</body>

</html>