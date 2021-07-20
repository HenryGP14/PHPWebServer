<?php
include('./../settings/config.php');
include('./../settings/utils.php');

$object = new Conection();
$conection = $object->connect($db);

// Método GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $cant_variables = count($_GET);
    // Recibir un dato si se envia un id
    if ($cant_variables > 0) {
        $key = array_keys($_GET);
        if ($key[0] == 'id-provincia') {
            $query = "SELECT * FROM canton WHERE idprovincia='{$_GET['id-provincia']}'";
            $result = $conection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            header("HTTP/1.1 200 OK");
            echo json_encode($result->fetchAll());
            exit();
        } else if ($key[0] == 'nom-provincia') {
            $query = "SELECT * FROM provincia WHERE nombre='{$_GET['nom-provincia']}'";
            $result = $conection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $all_data = $result->fetchAll();
            $id_provincia = $all_data[0]['idprovincia'];

            $query = "SELECT * FROM canton WHERE idprovincia='{$id_provincia}'";
            $result = $conection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $all_data = $result->fetchAll();

            header("HTTP/1.1 200 OK");
            echo json_encode($all_data);
            exit();
        } else if ($key[0] == 'provincia') {
            $query = "SELECT * FROM provincia WHERE nombre='{$_GET['provincia']}'";
            $result = $conection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $all_data = $result->fetchAll();

            header("HTTP/1.1 200 OK");
            echo json_encode($all_data);
            exit();
        } else if ($key[0] == 'provincia_id') {
            $query = "SELECT * FROM provincia WHERE idprovincia='{$_GET['provincia_id']}'";
            $result = $conection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            header("HTTP/1.1 200 OK");
            echo json_encode($result->fetchAll());
            exit();
        }
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
