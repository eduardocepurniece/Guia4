<?php 
 
/*    Cargar automáticamente la clase */ 
 
spl_autoload_register(function ($clase) { 
    require_once "clases/" . $clase . ".php"; 
}); 
 
/*    Iniciar sesión  */ 
 
session_start(); 
 
/*    Verificar que exista una cuenta abierta */ 
 
if (!isset($_SESSION["cuenta"])) { 
 
    header("Location: index.php"); 
    exit(); 
} 
 
/*    Recuperar el objeto de la sesión */ 
 
$cuenta = $_SESSION["cuenta"]; 
 
$mensaje = ""; 
 
/*    Cerrar la cuenta */ 
 
if (isset($_POST["cerrar"])) { 
 
    session_destroy(); 
 
    header("Location: index.php"); 
 
    exit(); 
} 
 
/*    Procesar operación bancaria */ 
 
if (isset($_POST["procesar"])) { 
 
    $operacion = htmlspecialchars(trim($_POST["operacion"] ?? "")); 
    $monto = (float) ($_POST["monto"] ?? 0); 
 
    if ($operacion == "Depositar") { 
 
        $cuenta->depositar($monto); 
 
    } elseif ($operacion == "Retirar") { 
 
        $cuenta->retirar($monto); 
 
    } 
 
    $mensaje = $cuenta->getMensaje(); 
 
    // Actualizar el objeto en la sesión 
    $_SESSION["cuenta"] = $cuenta; 
}
?> 
<!DOCTYPE html> 
<html lang="es"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Operaciones Bancarias</title> 
<link rel="stylesheet" href="css/estilos.css"> 
</head> 
<body> 
<div class="container"> 
<h1>Operaciones Bancarias</h1> 
<?php 
if (!empty($mensaje)) { 
echo "<div class='mensaje'>$mensaje</div>"; 
} 
?> 
<?php 
echo $cuenta->mostrarDatos(); 
?> 
<!--          
Formulario de operaciones --> 
<form method="post"> 
<label>Seleccione la operación</label> 
<select 
name="operacion" 
required> 
<option value=""> 
Seleccione una operación 
</option> 
<option value="Depositar"> 
Depositar 
</option> 
<option value="Retirar"> 
Retirar 
</option> 
</select> 
 
 <label>Monto (RD$)</label> 

 <input 
     type="number" 
     name="monto" 
     placeholder="Ej.: 500.00" 
     min="1" 
     step="0.01" 
     required> 

 <div class="botones"> 

     <button 
         type="submit" 
         name="procesar"> 

         Procesar operación 

     </button> 

 </div> 

</form> 

<!--          Formulario independiente para cerrar --> 

<form method="post"> 

 <div class="botones"> 

     <button 
         type="submit" 
         name="cerrar"> 

         Cerrar cuenta 

     </button> 

 </div> 

</form> 

</div> 

</body> 

</html>