<?php
class Conection
{
    // Abrir la conexión a la base de datos
    function connect($db)
    {
        try {
            $pgcon = new PDO(
                "pgsql:host={$db['host']}; dbname={$db['database']}; port={$db['port']}; ",
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

    // Obtener parametros para la consulta en git
    function getParams($input)
    {
        $filterParams = array();
        foreach ($input as $param => $value) {
            $filterParams[] = "$param=:$param";
        }
        return implode(', ', $filterParams);
    }
}
