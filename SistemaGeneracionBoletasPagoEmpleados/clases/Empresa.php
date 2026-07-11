<?php 
class Empresa 
{ 
/*  
Atributos */ 
private $nombre; 
private $rnc; 
private $direccion; 
private $telefono; 
/* Constructor */ 
public function __construct( 
$nombre, 
$rnc, 
$direccion, 
$telefono 
) { 
$this->nombre = $nombre; 
$this->rnc = $rnc; 
$this->direccion = $direccion; 
$this->telefono = $telefono; 
} 
/* Mostrar encabezado  */ 
public function mostrarEncabezado() 
{ 
return " 
<h2>{$this->nombre}</h2> 
<p><strong>RNC:</strong> {$this->rnc}</p> 
<p>{$this->direccion}</p> 
<p>Tel.: {$this->telefono}</p> 
<hr> 
"; 
} 
} 
?> 