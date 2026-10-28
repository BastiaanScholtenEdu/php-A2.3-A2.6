<?php
  require_once __DIR__ . '\..\app\core\trigger.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <header>
      <a href="?controller=home">Home</a>
      <a href="?controller=page1">Page 1</a>
      <a href="?controller=page2">Page 2</a>
    </header>
    

    <main><?php loadPage(); ?></main>
  </body>
</html>