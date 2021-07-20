<?php
include('./../settings/config.php');
include('./../settings/utils.php');

$object = new Conection();
$conection = $object->connect($db);

// Método GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['consulta'] == 'provincias') {
        $key = array_keys($_GET);
        if ($key[1] == 'id') {
            $query = "SELECT * FROM provincia WHERE idprovincia=:id";
            $result = $conection->prepare($query);
            $result->bindValue(':id', $_GET['id']);
            $result->execute();

            echo (array_keys($_GET)[1]);

            header("HTTP/1.1 200 OK");
            echo json_encode($result->fetch(PDO::FETCH_ASSOC));
            exit();
        } else if ($key[1] == 'nom-provincia') {
            $valor = str_replace('"', "'", $_GET['nom-provincia']);
            $query = "SELECT * FROM provincia WHERE nombre=" . $valor;
            $result = $conection->prepare($query);
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

        // Cantones
    } else if ($_GET['consulta'] == 'cantones') {
        $key = array_keys($_GET);
        if ($key[1] == 'id') {
            $query = "SELECT * FROM provincia WHERE idprovincia=:id";
            $result = $conection->prepare($query);
            $result->bindValue(':id', $_GET['id']);
            $result->execute();

            echo (array_keys($_GET)[1]);

            header("HTTP/1.1 200 OK");
            echo json_encode($result->fetch(PDO::FETCH_ASSOC));
            exit();
        } else if ($key[1] == 'nom-provincia') {
            $valor = str_replace('"', "'", $_GET['nom-provincia']);
            $query = "SELECT * FROM provincia WHERE nombre=" . $valor;
            $result = $conection->prepare($query);
            $result->execute();

            header("HTTP/1.1 200 OK");
            echo json_encode($result->fetch(PDO::FETCH_ASSOC));
            exit();
        } else {
            $query = "SELECT * FROM canton";
            $result = $conection->prepare($query);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);

            header("HTTP/1.1 200 OK");
            echo json_encode($result->fetchAll());
            exit();
        }
    } else {
        echo ("Página no encontrada");
    }
}
