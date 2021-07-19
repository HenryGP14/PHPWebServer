<?php
class Conection
{
    function connect($db)
    {
        try {
            $pgcon = new PDO(
                "pgsql:host={$db['host']}; dbname={$db['database']}; port=5432; ",
                $db['username'],
                $db['password'],
                array(PDO::ATTR_PERSISTENT => true)
            );
            $pgcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pgcon;
        } catch (Exception $e) {
            die("El error de conexión es: " . $e->getMessage());
        }
    }
}
