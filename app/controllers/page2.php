<?php
  if (isset($_GET["id"])) {
    $idCount = $_GET["id"];
  }
?>

<h2>Page 2</h2>
<p>
  <?php if (isset($idCount)): ?>
    <?= "Id count = $idCount" ?>
  <?php endif ?>
</p>