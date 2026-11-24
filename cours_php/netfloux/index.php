
<?php
require_once 'bdd.php';
require_once 'partials/head.php';

$page = $_GET['page'] ?? 'home';

require_once 'partials/header.php';


switch ($page) {
  case 'home':
    require 'pages/home.php';
    break;

  case 'add':
    require 'pages/add.php';
    break;

  case 'list':
    require 'pages/list.php';
    break;

  case 'details':
    require 'pages/details.php';
    break;

  default:
    echo '<h1>Page introuvable</h1>';
    break;
}

require_once 'partials/footer.php';
