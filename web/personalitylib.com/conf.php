<?php

$isLocalhost = (
    // localhost oder 127.0.0.1
    $_SERVER['HTTP_HOST'] === 'localhost' ||
    $_SERVER['SERVER_ADDR'] === '127.0.0.1'
);

if ($isLocalhost) {
    // Konfiguration für localhost
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'db100110');
} else {
    // Konfiguration für Internet
    define('DB_HOST', 'mysql10.manitu.net');
    define('DB_USER', getenv('DB_USERNAME'));
    define('DB_PASSWORD', getenv('DB_PASSWORD'));
    define('DB_NAME', 'db100110');

}

?>