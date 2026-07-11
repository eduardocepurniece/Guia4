<?php

class Usuario
{
    private int $idUsuario;
    private string $nombre;
    private string $apellido;
    private string $correo;
    private string $usuario;
    private string $clave;
    private string $rol;
    private bool $estado;

    //=========================
    // GETTERS
    //=========================

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getCorreo(): string
    {
        return $this->correo;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getClave(): string
    {
        return $this->clave;
    }
    public function getRol(): string
    {
        return $this->rol;
    }

    public function getEstado(): bool
    {
        return $this->estado;
    }

    //=========================
    // SETTERS
    //=========================

    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function setClave(string $clave): void
    {
        $this->clave = $clave;
    }

     public function setRol(string $rol): void
    {
        $this->rol = $rol;
    }
    public function setEstado(bool $estado): void
    {
        $this->estado = $estado;
    }
}