<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include('./settings/config.php');
    include('./settings/utils.php');
    $object = new Conection();
    $conection = $object->connect($db);
    $query = "Select * from provincia";

    $resultado = $conection->prepare($query);
    $resultado->execute();

    header("HTTP/1.1 200 OK");
    echo json_encode($resultado->fetchAll(),JSON_UNESCAPED_UNICODE);
    exit();?>
</body>
</html>

