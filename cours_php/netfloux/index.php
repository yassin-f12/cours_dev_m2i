
<?php
require_once 'bdd.php';
require_once 'partials/head.php';

$page = $_GET['page'] ?? 'home';

require_once 'partials/header.php';

$alertError = null;
$alertSuccess = null;

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

  case 'update':
    require 'pages/update.php';
    break;

  case 'delete':
    require 'pages/delete.php';
    break;

  case 'register':
    require 'pages/register.php';
    break;

  case 'login':
    require 'pages/login.php';
    break;

  default:
    echo '<h1>Page introuvable</h1>';
    break;
}

require_once 'partials/footer.php';
