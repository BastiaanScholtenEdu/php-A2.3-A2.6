<?php
function fruits()
{
  require_once __DIR__ . "\..\core\database.php";
  $conn = connDb(); // Initialize database

  $result = performQuery($conn, "SELECT id, name, color, sweetness, COUNT(*) OVER() AS totaal FROM fruits ORDER BY name ASC");
  $length = 0;
  $table = "";

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $length = (int) $row['totaal'];
      $table .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['color']}</td><td>{$row['sweetness']}</td><td><a href='?controller=fruitshow&id={$row['id']}'>👁</a></td></tr>";
    }
    $table .= "<tr><td colspan='5'>Aantal fruitsoorten: $length</td></tr>";
  } else {
    $table = "<tr><td colspan='5'>Geen fruit gevonden</td></tr>";
  }

  $output = "
    <h2>Fruits Database</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>color</th>
        <th>sweetness</th>
        <th>bekijken</th>
      </tr>
      {$table}
    </table>
  ";

  $conn->close();

  return $output;
}
?>