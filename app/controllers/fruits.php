<?php
  require_once __DIR__ . "\..\core\database.php";

  $db = connDb();
  $tables = getFromQuery($db, "SELECT id, name, color, sweetness FROM fruits");
?>

<h2>Fruits Database</h2>
<pre><?php print_r($tables); ?></pre>