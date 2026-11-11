<?php
  function fruitshow() {
    require_once __DIR__ . "\..\core\database.php";
    $conn = connDb();
    $output = "";

    if (isset($_GET["id"]) && is_numeric($_GET['id'])) {
      $result = getFromQuery($conn, "SELECT * FROM fruits WHERE id = {$_GET['id']}");
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $output = "
          <article>
            <h2>{$row['name']}</h2>
            <table>
              <tr>
                <th align='left'>ID:</th>
                <td>{$row['id']}</td>
              </tr>
              <tr>
                <th align='left'>Name:</th>
                <td>{$row['name']}</td>
              </tr>
              <tr>
                <th align='left'>Color:</th>
                <td>{$row['color']}</td>
              </tr>
              <tr>
                <th align='left'>Sweetness:</th>
                <td>{$row['sweetness']}/10</td>
              </tr>
            </table><br>
            <a href='?controller=fruits'>Ga terug</a>
          </article>
        ";
      } else {
        $output = "
          <article>
            <h2>Fruit niet gevonden</h2>
            <p>Er bestaat geen fruit record met de id {$_GET['id']}.</p>
          </article>
        ";
      }
    } elseif (!isset($_GET["id"])) {
      $output = "
        <article>
          <h2>Id Ontbreekt</h2>
          <p>Er is geen id opgegeven.</p>
          <a href='?controller=fruits'>Ga terug</a>
        </article>
      ";
      http_response_code(400);
    } elseif (!is_numeric($_GET["id"])) {
      $output = "
        <article>
          <h2>Id Ongeldig</h2>
          <p>Gebruik een heel getal als id.</p>
          <a href='?controller=fruits'>Ga terug</a>
        </article>
      ";
      http_response_code(400);
    }

    $conn->close();

    return $output;
  }
?>