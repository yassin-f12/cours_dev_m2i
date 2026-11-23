<?php
$prenom = "Alves";
$age = 32;


var_dump($age);
var_dump($prenom);

$html = "<p>Nom : $prenom  <br>Age : $age</p>";
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

  <?= "Nom : " . $prenom . "<br>Age :" . $age // OK
  ?><br>
  <?= "Nom : $prenom  <br>Age : $age" // OK
  ?>
  <?= $html // OK
  ?><br>
  <?= 'Nom : $prenom  <br>Age : $age' // FAUX
  ?>

</body>

</html>