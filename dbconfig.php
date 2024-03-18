<?php

try {
    define('user', 'root');
    define('password', '');
    define('servername', 'localhost');
    define('databname', 'crudDB');
    $conn = new PDO("mysql:host=" . servername . ";dbname=" . databname, user, password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES utf8');
}   catch (PDOException $th) {
    echo "Error : " .  $th->getMessage();
}
