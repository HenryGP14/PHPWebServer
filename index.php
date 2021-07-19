<?php
include('./settings/config.php');
include('./settings/utils.php');
$object = new Conection();
$conection = $object->connect($db);
$query = "Select * from mensajes";

$resultado = $conection->prepare($query);
$resultado->execute();

header("HTTP/1.1 200 OK");
echo json_encode($resultado->fetchAll());
exit();
