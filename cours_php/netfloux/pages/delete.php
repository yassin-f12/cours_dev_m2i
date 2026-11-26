
<?php
if (!isset($_SESSION['user'])) {
  header('Location: ?page=login');
  exit;
}

if (isset($_POST['id']) && filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
  try {

    $request = $db->prepare("
      SELECT picture FROM movie WHERE id = ?
    ");

    $request->execute([$_POST['id']]);
    $movie = $request->fetch();

    if ($movie) {

      $picture = $movie['picture'];
      $path = 'public/picture/' . $picture;

      if ($picture && file_exists($path)) {
        unlink($path);
      }

      $request = $db->prepare("
        DELETE FROM movie WHERE id = ?
      ");

      $request->execute([$_POST['id']]);

      $_SESSION['alertSuccess'] = "Le film a bien été supprimé.";
    } else {
      $_SESSION['alertError'] = "Aucun film correspondant n'a été trouvé.";
    }
  } catch (PDOException $e) {
    $_SESSION['alertError'] = "Impossible de supprimer ce film.";
  }
} else {
  $_SESSION['alertError'] = "Aucun film sélectionné.";
}

header('Location: ?page=list');
exit;
