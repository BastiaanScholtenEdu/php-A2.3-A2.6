<?php
  require_once __DIR__ . "\EnvLoader.php";

  EnvLoader::load(__DIR__ . "\..\\..\\.env");
  $dbHost = $_ENV["DB_HOST"];
  $dbUser = $_ENV["DB_USER"];
  $dbPass = $_ENV["DB_PASS"];
  $dbName = $_ENV["DB_NAME"];
?>