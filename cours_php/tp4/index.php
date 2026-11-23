<?php
$classe = [
  ["prenom" => "Inès", "nom" => "Martin", "note" => 14.5],
  ["prenom" => "Hugo", "nom" => "Bernard", "note" => 11],
  ["prenom" => "Léa", "nom" => "Petit", "note" => 9],
  ["prenom" => "Malik", "nom" => "Durand", "note" => 16],
  ["prenom" => "Chloé", "nom" => "Moreau", "note" => 7.5],
  ["prenom" => "Nathan", "nom" => "Lefèvre", "note" => 12],
  ["prenom" => "Sarah", "nom" => "Roux", "note" => 3],
  ["prenom" => "Tom", "nom" => "Fournier", "note" => 8],
];

$somme = 0;
$elevesAdmis = 0;
$meilleureNote = 0;

foreach ($classe as $eleve) {
  $somme += $eleve["note"];
  if ($eleve["note"] >= 10) {
    $elevesAdmis++;
  }
  if ($eleve["note"] > $meilleureNote) {
    $meilleureNote = $eleve["note"];
  }
}

$moyenne = $somme / count($classe);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP4 - le bulletin de la classe</title>
  <base href="tp4/">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Note</th>
        <th>Résultat</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($classe as $eleve) {
      ?>
        <tr>
          <td><?= $eleve["prenom"] ?></td>
          <td><?= $eleve["nom"] ?></td>
          <td><?= $eleve["note"] ?></td>
          <td><?= $eleve["note"] >= 10 ? "Admis" : "Non admis" ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <p>Moyenne de la classe : <?= number_format($moyenne, 2, ',', '') ?> / 20</p>
  <p>Meilleure note : <?= $meilleureNote ?> / 20</p>
  <p>Nombre d'admis : <?= $elevesAdmis ?> / <?= count($classe) ?></p>
</body>

</html>