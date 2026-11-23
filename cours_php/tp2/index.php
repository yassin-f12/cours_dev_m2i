<?php
$depart = "Paris";
$arrivee = "Lyon";
$distance = 465;
$prixLitre = 1.79;
$peage = 37.60;
$passagers = 3;

const CONSOMMATION = 6.5; // par convention en maj

$litres_consommer = $distance / 100 * CONSOMMATION;
$cout = $litres_consommer * $prixLitre;
$coutTotal = $cout + $peage;
$parPersonne = round($coutTotal / $passagers, 2);

// echo number_format(
//   $parPersonne, // le nombre a afficher
//   2, // le nombre de décimale
//   ",", // le séparateur décimale
//   " " // le séparateur des milliers
// ) . " €";

function formatEuro($montant)
{
  return number_format($montant, 2, ",", " ") . " €";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP2 - Le coût d'un trajet</title>
</head>

<body>
  <h1>Le trajet <?= "$depart  ->  $arrivee :" ?></h1>

  <p>Distance : <?= "$distance km" ?></p>
  <p>Consommation : <?= CONSOMMATION ?> L/100 km</p>
  <p>Litres consommés : <?= number_format($litres_consommer, 2, ",", " ") ?> L</p>
  <p>Coût du carburant : <?= formatEuro($cout) ?></p>
  <p>Péage : <?= formatEuro($peage) ?></p>
  <p>Nombre de passagers : <?= $passagers ?> Personnes</p>
  <p>Coût total : <?= formatEuro($coutTotal) ?></p>
  <p>Part par passager : <?= formatEuro($parPersonne) ?></p>
</body>

</html>