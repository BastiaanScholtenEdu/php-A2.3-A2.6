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

  if (isset($_GET["id"]) && is_numeric($_GET['id'])) {
    $idData = getFromQuery($conn, "SELECT name, color, sweetness FROM fruits WHERE id = {$_GET['id']}");
    if ($idData->num_rows > 0) {
      $row = $idData->fetch_assoc();
      $output = "
        <article>
          <h2>{$row['name']}</h2>
          <table>
            <tr>
              <th>Name:</th>
              <td>{$row['name']}</td>
            </tr>
            <tr>
              <th>Color:</th>
              <td>{$row['color']}</td>
            </tr>
            <tr>
              <th>Sweetness:</th>
              <td>{$row['sweetness']}/10</td>
            </tr>
          </table>
        </article>
      ";
    }
  } else {
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
  }



  $conn->close();

  return $output;
}
?>