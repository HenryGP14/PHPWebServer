<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        include('./settings/config.php');
        include('./settings/utils.php');
        $object = new Conection();
        $conection = $object->connect($db);
        $query = "Select * from mensajes";

        $resultado = $conection->prepare($query);
        $resultado->execute();
        $datos = $resultado->fetchAll();

        var_dump($datos);
        ?>
    </div>
</body>

</html>