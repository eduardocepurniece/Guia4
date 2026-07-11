<?php

class Nomina
{
    /* ==========================================
       Atributos
    ========================================== */

    private $empleado;

    /* ==========================================
       Constructor
    ========================================== */

    public function __construct($empleado)
    {
        $this->empleado = $empleado;
    }

    /* ==========================================
       AFP (Empleado 2.87%)
    ========================================== */

    public function calcularAFP()
    {
        return $this->empleado->getSalario() * 0.0287;
    }

    /* ==========================================
       SFS (Empleado 3.04%)
    ========================================== */

    public function calcularSFS()
    {
        return $this->empleado->getSalario() * 0.0304;
    }

    /* ==========================================
       Salario sujeto a ISR
    ========================================== */

    public function salarioImponible()
    {
        return
            $this->empleado->getSalario()
            - $this->calcularAFP()
            - $this->calcularSFS();
    }

    /* ==========================================
       ISR Mensual
    ========================================== */

    public function calcularISR()
    {
        $salario = $this->salarioImponible();

        if ($salario <= 34685) {
            return 0;
        }

        if ($salario <= 52027.43) {
            return ($salario - 34685) * 0.15;
        }

        if ($salario <= 72260.25) {
            return (($salario - 52027.43) * 0.20)
                + 2601.36;
        }

        return (($salario - 72260.25) * 0.25)
            + 6647.93;
    }

    /* ==========================================
       Total Descuentos
    ========================================== */

    public function calcularDescuentos()
    {
        return
            $this->calcularAFP()
            + $this->calcularSFS()
            + $this->calcularISR();
    }

    /* ==========================================
       Neto a Recibir
    ========================================== */

    public function calcularNeto()
    {
        return
            $this->empleado->getSalario()
            - $this->calcularDescuentos();
    }

    /* ==========================================
       Mostrar Boleta
    ========================================== */

    public function mostrarBoleta()
    {
        $html = "";

        $html .= "<div class='boleta'>";

        $html .= "<h2>BOLETA DE PAGO</h2>";

        $html .= "<p><strong>Código:</strong> "
            . $this->empleado->getCodigo()
            . "</p>";

        $html .= "<p><strong>Empleado:</strong> "
            . $this->empleado->getNombre()
            . "</p>";

        $html .= "<p><strong>Cédula:</strong> "
            . $this->empleado->getCedula()
            . "</p>";

        $html .= "<p><strong>Cargo:</strong> "
            . $this->empleado->getCargo()
            . "</p>";

        $html .= "<p><strong>Departamento:</strong> "
            . $this->empleado->getDepartamento()
            . "</p>";

        $html .= "<hr>";

        $html .= "<p><strong>Salario Bruto:</strong> RD$ "
            . number_format(
                $this->empleado->getSalario(),
                2
            )
            . "</p>";

        $html .= "<p>AFP: RD$ "
            . number_format(
                $this->calcularAFP(),
                2
            )
            . "</p>";

        $html .= "<p>SFS: RD$ "
            . number_format(
                $this->calcularSFS(),
                2
            )
            . "</p>";

        $html .= "<p>ISR: RD$ "
            . number_format(
                $this->calcularISR(),
                2
            )
            . "</p>";

        $html .= "<hr>";

        $html .= "<p><strong>Total Descuentos:</strong> RD$ "
            . number_format(
                $this->calcularDescuentos(),
                2
            )
            . "</p>";

        $html .= "<h3>Neto a Recibir: RD$ "
            . number_format(
                $this->calcularNeto(),
                2
            )
            . "</h3>";

        $html .= "</div>";

        return $html;
    }
}

?>