<?php
  require_once __DIR__ . "\..\core\database.php";

  $db = connDb();
  $tables = getFromQuery($db, "SELECT id, name, color, sweetness FROM fruits");
?>

<h2>Fruits Database</h2>
<table>
  <tr>
    <th>ID</th>
    <th>name</th>
    <th>color</th>
    <th>sweetness</th>
  </tr>
  
  <?php if (empty($tables)): ?>
    <?= "<tr><td colspan='4'>Geen fuits gevonden</td></tr>"; ?>
  <?php endif; ?>
</table>