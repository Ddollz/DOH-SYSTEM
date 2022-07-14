<?php
$host = "localhost";
$user = "root";
$password = "";
$dbName = "registry";


// set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;

//create PDO instance
$pdo = new PDO($dsn, $user,$password);
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
