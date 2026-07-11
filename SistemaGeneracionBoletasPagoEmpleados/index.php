<?php 
 
    /*     Cargar automáticamente las clases  */ 
    spl_autoload_register(function ($clase) { 
        require_once __DIR__ . "/clases/" . $clase . ".php"; 
    }); 
 
    /*     Iniciar sesión */ 
    session_start(); 
 
    /*     Procesar la apertura de la cuenta */ 
    $error = ""; 
 
    if (isset($_POST["generar"])) { 
 
        // Sanitizar la información 
        $codigo        = htmlspecialchars(trim($_POST["codigo"])); 
        $nombre        = htmlspecialchars(trim($_POST["nombre"])); 
        $cedula        = htmlspecialchars(trim($_POST["cedula"])); 
        $cargo         = htmlspecialchars(trim($_POST["cargo"])); 
        $departamento  = htmlspecialchars(trim($_POST["departamento"])); 
        $fechaIngreso  = $_POST["fechaIngreso"]; 
        $salario       = (float) $_POST["salario"]; 
 
        // Validar 
        if ( 
            empty($codigo) || 
            empty($nombre) || 
            empty($cedula) || 
            empty($cargo) || 
            empty($departamento) || 
            empty($fechaIngreso) || 
            $salario <= 0 
        ) { 
 
            $error = "Debe completar correctamente todos los datos del empleado."; 
        } else { 
 
            // Crear objetos 
            $empresa = new Empresa( 
                "Tecnología Empresarial Dominicana, SRL", 
                "1-30-98765-4", 
                "Av. John F. Kennedy, Santo Domingo", 
                "(809) 555-1000" 
            ); 
 
            $empleado = new Empleado( 
                $codigo, 
                $nombre, 
                $cedula, 
                $cargo, 
                $departamento, 
                $fechaIngreso, 
                $salario 
            ); 
 
            $nomina = new Nomina($empleado); 
 
            // Guardar en sesión 
            $_SESSION["empresa"] = $empresa; 
            $_SESSION["empleado"] = $empleado; 
            $_SESSION["nomina"] = $nomina; 
            header("Location: procesar.php"); 
            exit(); 
            } 
            } 
            ?> 
            <!DOCTYPE html> 
            <html lang="es"> 
            <head> 
            <meta charset="UTF-8"> 
            <meta name="viewport" 
            content="width=device-width, initial-scale=1.0"> 
            <title>Sistema de Nómina</title> 
            <link rel="stylesheet" href="css/estilos.css"> 
            </head> 
            <body> 
            <div class="contenedor"> 
            <!--       
            <header> 
            ENCABEZADO  --> 
            <img src="img/logo.png" 
            alt="Logo Empresa" 
            class="logo"> 
            <div> 
            <h1>Tecnología Empresarial Dominicana, SRL</h1> 
            <h2>Sistema de Gestión de Nómina</h2> 
            <p> 
            </p> 
            </div> 
            </header> 
            <!--     
            Generación de Boletas de Pago de Empleados 
            DESCRIPCIÓN  --> 
            <section class="introduccion"> 
            <h3>Registro del Empleado</h3> 
            <p> 
            Complete la información solicitada para generar la 
            boleta de pago correspondiente al empleado. El sistema 
            calculará automáticamente las deducciones de AFP, 
            Seguro Familiar de Salud (SFS), Impuesto Sobre la 
            Renta (ISR) y el salario neto conforme a la legislación 
            vigente de la República Dominicana. 
            </p> 
</section> 
<?php 
if (!empty($error)) { 
echo "<div class='mensajeError'>$error</div>"; 
} 
?> 
<!--      
FORMULARIO  --> 
<form method="post"> 
<fieldset> 
<legend>Datos Generales del Empleado</legend> 
<div class="fila"> 
<div class="grupo"> 
<label>Código</label> 
<input 
type="text" 
name="codigo" 
placeholder="EMP-001" 
required> 
</div> 
<div class="grupo"> 
<label>Nombre Completo</label> 
<input 
type="text" 
name="nombre" 
placeholder="Juan Pérez" 
required> 
</div> 
</div> 
<div class="fila"> 
<div class="grupo"> 
<label>Cédula</label> 
<input 
type="text" 
name="cedula" 
placeholder="001-1234567-8" 
required> 
</div> 
<div class="grupo"> 
<label>Cargo</label> 
<input 
type="text" 
name="cargo" 
placeholder="Analista de Sistemas" 
required> 
</div> 
</div> 
<div class="fila"> 
<div class="grupo"> 
<label>Departamento</label> 
<input 
type="text" 
name="departamento" 
placeholder="Tecnología" 
required> 
</div> 
<div class="grupo"> 
<label>Fecha de Ingreso</label> 
<input 
type="date" 
name="fechaIngreso" 
required> 
</div> 
</div> 
<div class="fila"> 
<div class="grupo"> 
<label>Salario Mensual (RD$)</label> 
<input 
type="number" 
name="salario" 
placeholder="50000" 
min="0" 
step="0.01" 
required> 
</div> 
</div> 
</fieldset> 
<div class="botones"> 
<button 
type="submit" 
name="generar"> 
Generar Boleta de Pago 
</button> 
<button 
type="reset"> 
Limpiar Formulario 
</button> 
</div> 
</form> 
<!--  PIE DE PÁGINA --> 
<footer> 
<p> 
Sistema de Gestión de Nómina | 
Programación Orientada a Objetos con PHP | 
© <?php echo date("Y"); ?> 
</p> 
</footer> 
</div> 
</body> 
</html>