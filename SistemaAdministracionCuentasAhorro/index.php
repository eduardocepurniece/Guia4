<?php

session_start();

$error = "";

/* ==========================================
   Autoload
========================================== */

spl_autoload_register(function ($clase) {
    require_once "clases/" . $clase . ".php";
});

/* ==========================================
   Procesar apertura de cuenta
========================================== */

if (isset($_POST["abrirCuenta"])) {

    // Limpieza y seguridad básica
    $numeroCuenta = htmlspecialchars(trim($_POST["numeroCuenta"]));
    $titular = htmlspecialchars(trim($_POST["titular"]));
    $cedula = htmlspecialchars(trim($_POST["cedula"]));
    $telefono = htmlspecialchars(trim($_POST["telefono"]));
    $correo = htmlspecialchars(trim($_POST["correo"]));
    $tipoCuenta = htmlspecialchars(trim($_POST["tipoCuenta"]));
    $saldoInicial = (float) $_POST["saldoInicial"];

    // Validación básica
    if (
        $numeroCuenta == "" ||
        $titular == "" ||
        $cedula == "" ||
        $telefono == "" ||
        $correo == "" ||
        $saldoInicial < 0
    ) {

        $error = "Debe completar todos los campos correctamente.";

    } else {

        // Crear objeto
        $cuenta = new BankAccount(
            $numeroCuenta,
            $titular,
            $cedula,
            $telefono,
            $correo,
            $tipoCuenta,
            $saldoInicial
        );

        // Guardar en sesión
        $_SESSION["cuenta"] = $cuenta;

        header("Location: operaciones.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Apertura de Cuenta</title>
    <link rel="stylesheet" href="css/estilos.css">
    
</head>

<body>

    <div class="container">

        <h1>Apertura de Cuenta Bancaria</h1>

        <?php if (!empty($error)) { ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="post">

            <label>Número de cuenta</label>
            <input
                type="text"
                name="numeroCuenta"
                placeholder="Ej: 100001"
                required>

            <label>Nombre del titular</label>
            <input
                type="text"
                name="titular"
                placeholder="Ej: Juan Pérez"
                required>

            <label>Cédula</label>
            <input
                type="text"
                name="cedula"
                placeholder="Ej: 001-1234567-8"
                required>

            <label>Teléfono</label>
            <input
                type="text"
                name="telefono"
                placeholder="Ej: 809-555-1234"
                required>

            <label>Correo electrónico</label>
            <input
                type="email"
                name="correo"
                placeholder="Ej: cliente@email.com"
                required>

            <label>Tipo de cuenta</label>
            <select name="tipoCuenta">
                <option value="Ahorro">Ahorro</option>
            </select>

            <label>Depósito inicial</label>
            <input
                type="number"
                name="saldoInicial"
                placeholder="Ej: 1000"
                min="0"
                step="0.01"
                required>

            <button type="submit" name="abrirCuenta">
                Abrir Cuenta
            </button>

        </form>

    </div>

</body>

</html>