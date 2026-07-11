<?php

class BankAccount
{
    /* ==========================================
       Atributos
    ========================================== */

    private $numeroCuenta;
    private $titular;
    private $cedula;
    private $telefono;
    private $correo;
    private $tipoCuenta;
    private $saldo;
    private $fechaApertura;
    private $estado;
    private $mensaje;

    /* ==========================================
       Constructor
    ========================================== */

    public function __construct(
        $numeroCuenta,
        $titular,
        $cedula,
        $telefono,
        $correo,
        $tipoCuenta,
        $saldoInicial
    ) {

        $this->numeroCuenta = $numeroCuenta;
        $this->titular = $titular;
        $this->cedula = $cedula;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->tipoCuenta = $tipoCuenta;
        $this->saldo = max(0, $saldoInicial);

        $this->fechaApertura = date("d/m/Y");
        $this->estado = "Activa";
        $this->mensaje = "Cuenta abierta correctamente.";
    }

    /* ==========================================
       Depósito
    ========================================== */

    public function depositar($monto)
    {
        if ($monto <= 0) {
            $this->mensaje = "El monto a depositar debe ser mayor que cero.";
            return;
        }

        $this->saldo += $monto;
        $this->mensaje = "Depósito realizado correctamente.";
    }

    /* ==========================================
       Retiro
    ========================================== */

    public function retirar($monto)
    {
        if ($monto <= 0) {
            $this->mensaje = "El monto del retiro debe ser mayor que cero.";
            return;
        }

        if ($monto > $this->saldo) {
            $this->mensaje = "Fondos insuficientes para realizar el retiro.";
            return;
        }

        $this->saldo -= $monto;
        $this->mensaje = "Retiro realizado correctamente.";
    }

    /* ==========================================
       Consultar saldo
    ========================================== */

    public function consultarSaldo()
    {
        return $this->saldo;
    }

    /* ==========================================
       Obtener mensaje
    ========================================== */

    public function getMensaje()
    {
        return $this->mensaje;
    }

    /* ==========================================
       Métodos Get
    ========================================== */

    public function getNumeroCuenta()
    {
        return $this->numeroCuenta;
    }

    public function getTitular()
    {
        return $this->titular;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTipoCuenta()
    {
        return $this->tipoCuenta;
    }

    public function getFechaApertura()
    {
        return $this->fechaApertura;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /* ==========================================
       Actualizar datos
    ========================================== */

    public function cambiarTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function cambiarCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function activarCuenta()
    {
        $this->estado = "Activa";
    }

    public function desactivarCuenta()
    {
        $this->estado = "Inactiva";
    }

    /* ==========================================
       Mostrar información
    ========================================== */

    public function mostrarDatos()
    {
        $html = "";

        $html .= "<div class='card-cuenta'>";

        $html .= "<h2>Cuenta de Ahorro</h2>";
        $html .= "<p><strong>No. Cuenta:</strong> {$this->numeroCuenta}</p>";
        $html .= "<p><strong>Titular:</strong> {$this->titular}</p>";
        $html .= "<p><strong>Cédula:</strong> {$this->cedula}</p>";
        $html .= "<p><strong>Teléfono:</strong> {$this->telefono}</p>";
        $html .= "<p><strong>Correo:</strong> {$this->correo}</p>";
        $html .= "<p><strong>Tipo de Cuenta:</strong> {$this->tipoCuenta}</p>";
        $html .= "<p><strong>Fecha de Apertura:</strong> {$this->fechaApertura}</p>";
        $html .= "<p><strong>Estado:</strong> {$this->estado}</p>";
        $html .= "<p><strong>Saldo Disponible:</strong> RD$ "
            . number_format($this->saldo, 2)
            . "</p>";

        $html .= "</div>";

        return $html;
    }
}

?>