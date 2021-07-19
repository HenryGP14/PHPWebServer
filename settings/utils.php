<?php
class Conection
{
    function connect($db)
    {
        try {
            $pgcon = new PDO("pgsql:host={$db['host']} dbname={$db['database']} user={$db['username']} password={$db['password']}");
            return $pgcon;
        } catch (Exception $e) {
            die("El error de conexión es: " . $e->getMessage());
        }
    }
}
