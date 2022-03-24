<?php
define("DB_HOST", "localhost");
define("DB_NAME", "ShadesOfGreen_Database");
define("DB_USER", "benpernotuos");
define("DB_PASS", "99CrQ72MbsxnriW");

try {
    $Conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $Conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $Conn->setAttribute(PDO::ATTR_PERSISTENT, true);
    $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
