<?php
  function page2() {
    if (isset($_GET["id"])) {
      $idCount = $_GET["id"];
    }
    $result = "<h2>Page 2</h2>";
    if (isset($idCount)) {
      $result .= "<p>Id count = $idCount</p>";
    }
    return $result;
  }
?>