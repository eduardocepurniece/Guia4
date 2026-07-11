<?php

session_start();

require_once "../DAL/UsuarioDAL.php";

if(
    !isset($_POST["usuario"]) ||
    !isset($_POST["clave"])
)
{
    header("Location: login.php");
    exit();
}

$usuario = trim($_POST["usuario"]);

$clave = trim($_POST["clave"]);
$rol = trim($_POST["rol"]);

$usuarioDAL = new UsuarioDAL();

$datos = $usuarioDAL->validarLogin(
            $usuario,
            $clave,
            $rol
          );

if($datos != null)
{
    $_SESSION["idUsuario"] =
        $datos->getIdUsuario();

    $_SESSION["usuario"] =
        $datos->getUsuario();

    $_SESSION["nombre"] =
        $datos->getNombre() .
        " " .
        $datos->getApellido();

    header("Location: ../dashboard.php");
}
else
{
    header("Location: login.php?error=1");
}

exit();

?>