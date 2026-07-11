<?php

/* ==========================================
   Cargar clases
========================================== */

spl_autoload_register(function ($clase) {
    require_once __DIR__ . "/clases/" . $clase . ".php";
});

/* ==========================================
   Iniciar sesión
========================================== */

session_start();

/* ==========================================
   Verificar existencia de la información
========================================== */

if (
    !isset($_SESSION["empresa"]) ||
    !isset($_SESSION["empleado"]) ||
    !isset($_SESSION["nomina"])
) {
    header("Location: index.php");
    exit();
}

/* ==========================================
   Recuperar objetos
========================================== */

$empresa = $_SESSION["empresa"];
$empleado = $_SESSION["empleado"];
$nomina = $_SESSION["nomina"];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Pago</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="contenedor">

        <!-- ENCABEZADO -->

        <header class="encabezado">

            img/logo.png"
                class="logo"
                alt="Logo Empresa">

            <div>
                <?php echo $empresa->mostrarEncabezado(); ?>
            </div>

        </header>

        <!-- TITULO -->

        <section class="titulo">

            <h1>BOLETA DE PAGO</h1>

            <p>
                Comprobante de pago correspondiente
                al empleado registrado.
            </p>

        </section>

        <!-- BOLETA -->

        <section class="boleta">

            <?php
            echo $nomina->mostrarBoleta();
            ?>

        </section>

        <!-- RESUMEN -->

        <section class="resumen">

            <h2>Resumen de Descuentos</h2>

            <table>

                <tr>
                    <th>Concepto</th>
                    <th>Valor</th>
                </tr>

                <tr>
                    <td>Salario Bruto</td>
                    <td>
                        RD$
                        <?php
                        echo number_format(
                            $empleado->getSalario(),
                            2
                        );
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>AFP (2.87%)</td>
                    <td>
                        RD$
                        <?php
                        echo number_format(
                            $nomina->calcularAFP(),
                            2
                        );
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>SFS (3.04%)</td>
                    <td>
                        RD$
                        <?php
                        echo number_format(
                            $nomina->calcularSFS(),
                            2
                        );
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>ISR</td>
                    <td>
                        RD$
                        <?php
                        echo number_format(
                            $nomina->calcularISR(),
                            2
                        );
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Total Descuentos</th>
                    <th>
                        RD$
                        <?php
                        echo number_format(
                            $nomina->calcularDescuentos(),
                            2
                        );
                        ?>
                    </th>
                </tr>

                <tr>
                    <th>Salario Neto</th>
                    <th>
                        RD$
                        <?php
                        echo number_format(
                            $nomina->calcularNeto(),
                            2
                        );
                        ?>
                    </th>
                </tr>

            </table>

        </section>

        <!-- BOTONES -->

        <div class="botones no-imprimir">

            <button onclick="window.open('imprimir.php','_blank');">
                🖨 Imprimir Boleta
            </button>

            index.php
                Nuevo Empleado
            </button>

        </div>

        <!-- PIE -->

        <footer class="no-imprimir">

            <hr>

            <p>
                Sistema de Gestión de Nómina |
                Tecnología Empresarial Dominicana, SRL |
                © <?php echo date("Y"); ?>
            </p>

        </footer>

    </div>

</body>

</html>