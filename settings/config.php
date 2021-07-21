<?php
require("../vendor/autoload.php");
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();
$db = [
    'host' => $_ENV['DATABASE_HOST'],
    'username' => $_ENV['DATABASE_USERNAME'],
    'password' => $_ENV['DATABASE_PASSWORD'],
    'database' => $_ENV['DATABASE_NAME'],
    'port' => $_ENV['DATABASE_PORT']
];
