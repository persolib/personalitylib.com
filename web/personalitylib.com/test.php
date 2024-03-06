<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <title>SQL Test</title>
</head>

<body>
    <?php
    //   // Verbindungsparameter definieren
    //   $host = "mysql10.manitu.net";
    //   $port = 3306;
    //   $dbname = "db100110";
    //   $username = "u100110";
    //   $password = "ShJ6nHfvrWFyr9Nu";

    //   // Verbindung zur Datenbank herstellen
    //   try {
    //       $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    //       // Verbindung erfolgreich
    //       echo "Connection successful";
    //   } catch (PDOException $e) {
    //       // Verbindung fehlgeschlagen
    //       echo "Connection Failed: " . $e->getMessage();
    //   }

    //   // ... hier den Code für die Abfragen und Aktionen in der Datenbank einfügen ...

    //   // Verbindung zur Datenbank schließen
    //   $db = null;
    ?>

    <?php
// Sanitize user input to prevent potential security vulnerabilities (XSS attacks)
if (isset($_GET['tag']) && !empty($_GET['tag'])) {
    $sanitizedTag = htmlspecialchars($_GET['tag']); // Escape special characters
    echo "The sanitized value of the tag input is: '$sanitizedTag'<br>";

    // Additional processing or validation using $sanitizedTag as needed
} else {
    echo "Please enter a value in the text input.";
}

?>
    <form name="form" action="" method="get">
        <label for="tag">Enter tag:</label>
        <input type="text" name="tag" id="tag">
        <button type="submit">Submit</button>
    </form>

</body>

</html>