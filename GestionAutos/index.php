<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Venta de Autos</title>
    <link rel="stylesheet" href="css/estilos.css"> 

</head>

<body>

    <div class="container">

        <h1>Autos disponibles</h1>

        <div class="contenedor-autos">

            <?php

            // Cargar automáticamente la clase Auto
            spl_autoload_register(function ($clase) {
                require_once "clases/" . $clase . ".php";
            });

            // Crear el arreglo de objetos
            $movil = [];

            $movil[] = new Auto("Peugeot", "308", "Gris", "img/peugeot.jpg");
            $movil[] = new Auto("Renault", "Clio", "Rojo", "img/renaultclio.jpg");
            $movil[] = new Auto("BMW", "X3", "Negro", "img/bmwserie6.jpg");
            $movil[] = new Auto("Toyota", "Avalon", "Blanco", "img/toyota.jpg");

            // Mostrar los autos
            foreach ($movil as $auto) {
                $auto->mostrar();
            }

            ?>

        </div>

    </div>

</body>

</html>