<?php

session_start();

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION["usuario"])) {

    header("Location: dashboard.php");

} else {

    header("Location: login/login.php");

}

exit();

?>