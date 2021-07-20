<?php
include('../settings/config.php');
include('../settings/utils.php');

$object = new Conection();
$conection = $object->connect($db);

// Método GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $query = "SELECT * FROM provincia WHERE idprovincia=:id";
        $result = $conection->prepare($query);
        $result->bindValue(':id', $GET['id']);
        $result->execute();

        header("HTTP/1.1 200 OK");
        echo json_encode($result->fetch(PDO::FETCH_ASSOC));
        exit();
    } else {
        $query = "SELECT * FROM provincia";
        $result = $conection->prepare($query);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        header("HTTP/1.1 200 OK");
        echo json_encode($result->fetchAll());
        exit();
    }
}
