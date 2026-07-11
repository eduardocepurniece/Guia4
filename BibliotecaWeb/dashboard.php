<?php

require_once "includes/verificarSesion.php";
require_once "includes/header.php";
require_once "includes/menu.php";

?>

<main>

    <h2>Panel Principal</h2>

    <p>
        Bienvenido al <strong>Sistema Web para la Gestión de Préstamos de Biblioteca</strong>.
    </p>

    <p>
        Usuario autenticado:
        <strong><?php echo $_SESSION["nombre"]; ?></strong>
    </p>

    <hr>

    <h3>Módulos del sistema</h3>

    <table border="1" cellpadding="8" cellspacing="0">

        <tr>
            <th>Módulo</th>
            <th>Descripción</th>
        </tr>

        <tr>
            <td>Usuarios</td>
            <td>Administración de los usuarios autorizados para acceder al sistema.</td>
        </tr>

        <tr>
            <td>Libros</td>
            <td>Registro y administración de los libros disponibles en la biblioteca.</td>
        </tr>

        <tr>
            <td>Lectores</td>
            <td>Administración de los usuarios de la biblioteca.</td>
        </tr>

        <tr>
            <td>Préstamos</td>
            <td>Registro y control del préstamo y devolución de libros.</td>
        </tr>

    </table>

    <br>

    <p>

        Desde este panel podrá acceder a cada uno de los módulos utilizando el menú de navegación ubicado en la parte superior de la página.

    </p>

</main>

<?php

require_once "includes/footer.php";

?>