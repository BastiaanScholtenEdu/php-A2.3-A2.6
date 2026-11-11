<?php
  function fruitadd() {
    require_once __DIR__ . "/../core/database.php";
    $conn = connDb();

    $form = "
      <h2>Fruit toevoegen</h2>

      <form action='' method='POST'>
        <input type='text' placeholder='Name' name='name' required><br><br>
        <input type='text' placeholder='Color' name='color' required><br><br>
        <input type='number' placeholder='Sweetness' name='sweetness' required><br><br>

        <input type='submit' name='submit' value='Voeg toe'>
      </form>
    ";


    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"], $_POST["color"], $_POST["sweetness"]) && is_numeric($_POST["sweetness"])) {
      $query =  "INSERT INTO fruits (name, color, sweetness) 
        VALUES ('{$_POST["name"]}', '{$_POST["color"]}', '{$_POST["sweetness"]}')";  
      performQuery($conn, $query);

      if ($conn->query($query) === TRUE) {
        header("Location: ?controller=fruits");
      } else {
        $form =  "Error: " . $query . "<br>" . $conn->error;
      }
    }

    return $form;
  }
?>