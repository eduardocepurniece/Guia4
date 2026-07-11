<?php 
class Empleado 
{ 
/* Atributos */ 
private $codigo; 
private $nombre; 
private $cedula; 
private $cargo; 
private $departamento; 
private $fechaIngreso; 
private $salario; 
/* Constructor */ 
public function __construct( 
    $codigo, 
    $nombre, 
    $cedula, 
    $cargo, 
    $departamento, 
    $fechaIngreso, 
    $salario 
) { 

    $this->codigo = $codigo; 
    $this->nombre = $nombre; 
    $this->cedula = $cedula; 
    $this->cargo = $cargo; 
    $this->departamento = $departamento; 
    $this->fechaIngreso = $fechaIngreso; 
    $this->salario = $salario; 
} 

/* Métodos Get */ 
public function getCodigo() 
{ 
    return $this->codigo; 
} 

public function getNombre() 
{ 
    return $this->nombre; 
} 

public function getCedula() 
{ 
    return $this->cedula; 
} 

public function getCargo() 
{ 
    return $this->cargo; 
} 

public function getDepartamento() 
{ 
    return $this->departamento; 
} 

public function getFechaIngreso() 
{ 
    return $this->fechaIngreso; 
} 

public function getSalario() 
{ 
    return $this->salario; 
} 
} 
?> 