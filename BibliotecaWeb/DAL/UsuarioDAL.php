<?php

require_once "Conexion.php";
require_once "../ENTIDADES/Usuario.php";

class UsuarioDAL
{
    private PDO $conexion;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->conexion = $conexion->conectar();
    }

    //==============================
    // LISTAR USUARIOS
    //==============================

    public function listar(): array
    {
        $sql = "SELECT * FROM Usuarios
                ORDER BY Apellido, Nombre";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll();
    }

    //==============================
    // BUSCAR POR ID
    //==============================

    public function buscar(int $id): ?Usuario
    {
        $sql = "SELECT *
                FROM Usuarios
                WHERE IdUsuario = ?";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute([$id]);

        $fila = $consulta->fetch();

        if (!$fila)
        {
            return null;
        }

        $usuario = new Usuario();

        $usuario->setIdUsuario($fila["IdUsuario"]);
        $usuario->setNombre($fila["Nombre"]);
        $usuario->setApellido($fila["Apellido"]);
        $usuario->setCorreo($fila["Correo"]);
        $usuario->setUsuario($fila["Usuario"]);
        $usuario->setClave($fila["Clave"]);
        $usuario->setClave($fila["Rol"]);
        $usuario->setEstado($fila["Estado"]);

        return $usuario;
    }

    //==============================
    // INSERTAR
    //==============================

    public function insertar(Usuario $usuario): bool
    {
        $sql = "INSERT INTO Usuarios
                (
                    Nombre,
                    Apellido,
                    Correo,
                    Usuario,
                    Clave,
                    Rol,
                    Estado
                )

                VALUES
                (
                    ?,?,?,?,?,?,?
                )";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            $usuario->getNombre(),
            $usuario->getApellido(),
            $usuario->getCorreo(),
            $usuario->getUsuario(),
            $usuario->getClave(),
            $usuario->getRol(),
            $usuario->getEstado()
        ]);
    }

    //==============================
    // ACTUALIZAR
    //==============================

    public function actualizar(Usuario $usuario): bool
    {
        $sql = "UPDATE Usuarios

                SET
                    Nombre=?,
                    Apellido=?,
                    Correo=?,
                    Usuario=?,
                    Clave=?,
                    Rol=?,
                    Estado=?

                WHERE IdUsuario=?";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            $usuario->getNombre(),
            $usuario->getApellido(),
            $usuario->getCorreo(),
            $usuario->getUsuario(),
            $usuario->getClave(),
             $usuario->getRol(),
            $usuario->getEstado(),
            $usuario->getIdUsuario()
        ]);
    }

    //==============================
    // ELIMINAR
    //==============================

    public function eliminar(int $id): bool
    {
        $sql = "DELETE FROM Usuarios
                WHERE IdUsuario=?";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([$id]);
    }

    //==============================
    // VALIDAR LOGIN
    //==============================

    public function validarLogin(
        string $usuario,
        string $clave,
        string $rol
    ): ?Usuario
    {
        $sql = "SELECT *
                FROM Usuarios

                WHERE Usuario=?
                AND Clave=?
                AND Rol =?
                AND Estado=1";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute([
            $usuario,
            $clave,
            $rol
        ]);

        $fila = $consulta->fetch();

        if (!$fila)
        {
            return null;
        }

        $objUsuario = new Usuario();

        $objUsuario->setIdUsuario($fila["IdUsuario"]);
        $objUsuario->setNombre($fila["Nombre"]);
        $objUsuario->setApellido($fila["Apellido"]);
        $objUsuario->setCorreo($fila["Correo"]);
        $objUsuario->setUsuario($fila["Usuario"]);
        $objUsuario->setClave($fila["Clave"]);
        $objUsuario->setClave($fila["Rol"]);
        $objUsuario->setEstado($fila["Estado"]);

        return $objUsuario;
    }
}