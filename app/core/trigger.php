<?php
  function loadPage() {
    $controller = ($_GET["controller"] ?? "") ?: "home";
    $allowedPages = ["home", "page1", "page2"];
    
    if (!in_array($controller, $allowedPages, true)) {
      http_response_code(404);
      echo "Page not found - 404"; 
      exit;
    }

    include __DIR__ . "\..\controllers\\" . $controller . ".php";
  }
?>