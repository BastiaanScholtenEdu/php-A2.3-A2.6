<?php
function fruits()
{
  require_once __DIR__ . "\..\core\database.php";
  $conn = connDb(); // Initialize database


  $result = getFromQuery($conn, "SELECT id, name, color, sweetness FROM fruits ORDER BY name ASC");
  $length = $result->num_rows;
  $table = "";

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $table .= "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['color']}</td><td>{$row['sweetness']}</td><td><a href='?controller=fruits&id={$row['id']}'>&#128065;</a></td></tr>";
    }
    $table .= "<tr><td colspan='5'>Aantal fruitsoorten: $length</td></tr>";
  } elseif (empty($table)) {
    $body = "<tr><td colspan='5'>Geen fuits gevonden</td></tr>";
  }


  $result = "
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

  return $result;
}
?>