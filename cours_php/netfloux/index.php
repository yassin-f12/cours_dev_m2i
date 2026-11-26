
<?php
session_start();

if (isset($_GET['logout'])) {
  $_SESSION = [];
  session_destroy();

  header('Location: ?page=home');
  exit;
}

require_once 'bdd.php';

$page = $_GET['page'] ?? 'home';

if ($page === 'category') {
  if (!isset($_SESSION['user']) || $_SESSION['user']['user_is_admin'] !== 1) {
    header('Location: ?page=home');
    exit;
  }
}

require_once 'partials/head.php';
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

  case 'category':
    require 'pages/category.php';
    break;

  case 'details':
    require 'pages/details.php';
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
