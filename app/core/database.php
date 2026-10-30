<?php
  require_once __DIR__ . "\EnvLoader.php";

  EnvLoader::load(__DIR__ . "\..\\..\\.env");
  $dbHost = $_ENV["DB_HOST"];
  $dbUser = $_ENV["DB_USER"];
  $dbPass = $_ENV["DB_PASS"];
  $dbName = $_ENV["DB_NAME"];

  
  function connDb(): mysqli {
    global $dbHost, $dbUser, $dbPass, $dbName;
    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }
    return $mysqli;
  }

  function getFromQuery(mysqli $db, string $query) {
    $result = $db -> query($query);
    return $result -> fetch_all(MYSQLI_ASSOC);
  }

?>