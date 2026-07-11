<?php

session_start();

/* Verificar si existe una sesión activa */

if (!isset($_SESSION["usuario"])) {
    header("Location: autenticacionbasica.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="contenedor">

        <h1>Bienvenido al Sistema</h1>

        <div class="mensaje">

            <p>
                Sesión iniciada correctamente.
            </p>

            <p>
                <strong>Usuario autenticado:</strong>
                <?php echo htmlspecialchars($_SESSION["usuario"]); ?>
            </p>

        </div>

        <div class="formulario">

            <h2>Contenido Protegido</h2>

            <p>
                Esta es una página protegida del sistema.
                Solo los usuarios autenticados pueden acceder a este contenido.
            </p>

            <p>
                Has iniciado sesión correctamente utilizando el sistema de autenticación básico con PHP.
            </p>

            <form action="logout.php" method="POST">

                <button type="submit">
                    Cerrar sesión
                </button>

            </form>

        </div>

    </div>

</body>

</html>