<?php
$prenom = "Alves";

var_dump($prenom);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?= date("d/m/Y"); ?>

  <?php
  echo "<h1>Hello World</h1>";
  ?>

  <?= "<h1>Hello $prenom</h1>"; ?>

</body>

</html>