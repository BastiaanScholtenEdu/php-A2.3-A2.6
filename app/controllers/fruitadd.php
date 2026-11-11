<?php
  function fruitadd() {
    $form = "
      <h2>Fruit toevoegen</h2>

      <form action='' method='POST'>
        <input type='text' placeholder='Name' name='name' required><br><br>
        <input type='text' placeholder='Color' name='color' required><br><br>
        <input type='number' placeholder='Sweetness' name='sweetness' required><br><br>

        <input type='submit' name='submit' value='Voeg toe'>
      </form>
    ";

    return $form;
  }
?>