<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
      // Verbindungsparameter definieren
      $host = "mysql10.manitu.net";
      $port = 3306;
      $dbname = "db100110";
      $username = "u100110";
      $password = "ShJ6nHfvrWFyr9Nu";

      // Verbindung zur Datenbank herstellen
      try {
          $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
          // Verbindung erfolgreich
          echo "Verbindung zur Datenbank erfolgreich hergestellt!";
      } catch (PDOException $e) {
          // Verbindung fehlgeschlagen
          echo "Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage();
      }

      // ... hier den Code für die Abfragen und Aktionen in der Datenbank einfügen ...

      // Verbindung zur Datenbank schließen
      $db = null;
    ?>
</body>

</html>