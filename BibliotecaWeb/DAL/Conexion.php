<?php

class Conexion
{
   // Parámetros de conexión
    private string $servidor = "127.0.0.1";
    private string $baseDatos = "BibliotecaDB";
    private string $usuario = "root";
    private string $clave = "";

    // Objeto PDO
    private ?PDO $conexion = null;

    /**
     * Establece la conexión con SQL Server.
     */
    public function conectar(): PDO
    {
        try
        {
            $dsn = "mysql:host={$this->servidor};dbname={$this->baseDatos};charset=utf8mb4";

            $this->conexion = new PDO(
                $dsn,
                $this->usuario,
                $this->clave
            );

            $this->conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $this->conexion->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return $this->conexion;
        }
        catch(PDOException $e)
        {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}