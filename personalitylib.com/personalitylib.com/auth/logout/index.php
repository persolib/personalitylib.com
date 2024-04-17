<?php

// Starten Sie die Sitzung, falls sie noch nicht gestartet ist
session_start();

// Löschen Sie alle Sitzungsvariablen
$_SESSION = array();

// unset cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

// Zerstören Sie die Sitzung
session_destroy();

// Leiten Sie den Benutzer zur Anmeldeseite um
header("Location: ..");
exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<body>
</body>

</html>