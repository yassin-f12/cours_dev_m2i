<?php
if (!isset($_SESSION['user'])) {
  header('Location: ?page=login');
  exit;
}

if (isset($_POST['id'])) {
  try {
    $request = $db->prepare("DELETE FROM movie WHERE id = ?");
    $request->execute([$_POST['id']]);

    if ($request->rowCount() > 0) {
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
