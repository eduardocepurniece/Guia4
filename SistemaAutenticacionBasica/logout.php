Contenido del Archivo logout.php 
<?php 
session_start(); 
// Elimina todas las variables de sesión 
session_unset(); 
// Destruye la sesión 
session_destroy(); 
?> 
<!DOCTYPE html> 
<html lang="es"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Fin de la sesión</title> 
<link rel="stylesheet" href="estilos.css"> 
</head> 
<body> 
<div class="contenedor mensaje"> 
<h1>Has cerrado la sesión</h1> 
<p> 
</p> 
<p> 
</a> 
</div> 
</body> 
</html> 