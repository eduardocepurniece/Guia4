<?php 
session_start(); 
// Si el usuario ya inició sesión, redirigir a la página principal 
if (isset($_SESSION["usuario"])) { 
header("Location: inicio.php"); 
exit(); 
} 
$mensaje = ""; 
// Procesar el formulario cuando se envía 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $usuario = trim($_POST["usuario"]); 
    $clave   
    = trim($_POST["clave"]); 
    // Validación de credenciales 
    if ($usuario == "ramon" && $clave == "morillo") { 
    // Regenerar el identificador de sesión por seguridad 
    session_regenerate_id(true); 
    $_SESSION["usuario"] = $usuario; 
    header("Location: inicio.php"); 
    exit(); 
    } else { 
    $mensaje = "Usuario o contraseña incorrectos."; 
    } 
    } 
    ?> 
    <!DOCTYPE html> 
    <html lang="es"> 
    <head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Autenticación Básica</title> 
    <link rel="stylesheet" href="estilos.css"> 
    </head> 
    <body> 
    <div class="formulario"> 
    <h2>Inicio de Sesión</h2> 
    <form method="POST" action="autenticacionbasica.php"> 
    <label for="usuario">Usuario</label> 
    <input 
    type="text" 
    id="usuario" 
    name="usuario" 
    required 
    autofocus> 
    <label for="clave">Contraseña</label> 
    <input 
    type="password" 
    id="clave" 
    name="clave" 
    required 
    minlength="6"
    maxlength="20" 
placeholder="Ingrese su contraseña"> 
<button type="submit"> 
Iniciar sesión 
</button> 
</form> 
<?php if (!empty($mensaje)) { ?> 
<div class="error"> 
<?php echo htmlspecialchars($mensaje); ?> 
</div> 
<?php } ?> 
</div> 
</body> 
</html> 