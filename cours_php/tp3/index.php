<?php
$age = 22;
$etudiant = true;
$jour = "samedi";

if ($age < 14) {
  $prix = 6;
  $tarif = "Tarif enfant";
} elseif ($jour === "mercredi") {
  $prix = 7;
  $tarif = "Tarif mercredi";
} elseif ($etudiant) {
  $prix = 8;
  $tarif = "Tarif étudiant";
} else {
  $prix = 11.50;
  $tarif = "Plein tarif";
}

$message = match ($jour) {
  "mercredi" => "7 € dès 14 ans",
  "samedi", "dimanche" => "Pensez à reserver",
  default => "Bonne séance",
};

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP 3 - La billetterie du cinema</title>
</head>

<body>
  <p><?= $tarif ?> : <?= number_format($prix, 2, ",", " ") ?> €</p>
  <p><?= $etudiant ? "Pensez à votre carte étudiante." : "" ?></p>
  <p><?= $message ?></p>
</body>

</html>