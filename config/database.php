<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'Denis');
define('DB_PASS', '123456');
define('DB_NAME', 'php_dev');

// This creates the connection

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// To check the connection

if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

