<?php
$nom = "Alves";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tp - 1</title>
  <base href="tp1/">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?=
  "<h1>Page du jour</h1>",

  "<h2>Bienvenue $nom</h2>",

  "<p>Le programme est extrêmement simple et PHP n'est pas nécessaire pour créer une page web comme ceci. 
    Elle ne fait qu'afficher Bonjour le monde, grâce à la fonction echo de PHP. Il est à noter que ce fichier n'a pas besoin d'être exécutable ou autre, 
    dans aucun cas. Le serveur sait que ce fichier a besoin d'être interprété par PHP, car l'extension 
    est utilisée, et le serveur est configuré pour les passer à PHP. Il s'agit d'une page HTML normale qui contient une série de balises spéciales qui permettent de réaliser 
    beaucoup de choses intéressantes.
  </p>",

  date("d/m/Y");
  ?>
</body>

</html>