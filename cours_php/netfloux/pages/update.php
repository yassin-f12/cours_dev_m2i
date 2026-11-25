<?php
if (!isset($_SESSION['user'])) {
  header('Location: ?page=login');
  exit;
}

$id = $_GET['id'] ?? null;
$movie = null;
$categories = [];
$formValues = [];

try {
  if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
    throw new Exception("Identifiant du film invalide.");
  }

  $request = $db->prepare("SELECT * FROM movie WHERE id = ?");
  $request->execute([$id]);
  $movie = $request->fetch();

  if (!$movie) {
    throw new Exception("Film introuvable.");
  }

  $request = $db->query("SELECT * FROM category ORDER BY cat_name ASC");
  $categories = $request->fetchAll();

  $timeParts = explode(':', $movie['movie_time'] ?? '00:00:00');

  $formValues = [
    'title' => $movie['title'],
    'year' => $movie['movie_year'],
    'time' => ((int)$timeParts[0] * 60) + (int)$timeParts[1],
    'id_category' => $movie['id_category'],
    'summary' => $movie['summary'],
    'picture' => $movie['picture'],
    'trailer' => $movie['trailer']
  ];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $formValues = array_merge($formValues, $_POST);

    if (empty($formValues['title']) || empty($formValues['id_category'])) {
      throw new Exception("Veuillez remplir le titre et la catégorie.");
    }

    $time = null;

    if ($formValues['time'] !== '') {
      $hours = intdiv((int)$formValues['time'], 60);
      $minutes = (int)$formValues['time'] % 60;
      $time = sprintf('%02d:%02d:00', $hours, $minutes);
    }

    $request = $db->prepare("
            UPDATE movie
            SET title = ?,
                summary = ?,
                movie_year = ?,
                movie_time = ?,
                trailer = ?,
                picture = ?,
                id_category = ?
            WHERE id = ?
        ");

    $request->execute([
      $formValues['title'],
      $formValues['summary'] ?: null,
      $formValues['year'] ?: null,
      $time,
      $formValues['trailer'] ?: null,
      $formValues['picture'] ?: null,
      $formValues['id_category'],
      $id
    ]);

    $_SESSION['alertSuccess'] = "Le film a bien été modifié.";

    header('Location: ?page=list');
    exit;
  }
} catch (PDOException $e) {
  $alertError = "Une erreur est survenue lors du traitement du film.";
} catch (Exception $e) {
  $alertError = $e->getMessage();
}

require 'partials/alert.php';
?>

<?php if (isset($movie) && $movie) { ?>

  <h1 class="mb-4">Modifier un film</h1>

  <form action="?page=update&id=<?= $id ?>" method="POST">

    <div class="form-group mb-3">
      <label for="title">Titre</label>
      <input
        type="text"
        name="title"
        id="title"
        class="form-control"
        value="<?= htmlspecialchars($formValues['title'] ?? '') ?>"
        required>
    </div>

    <div class="form-group mb-3">
      <label for="year">Année</label>
      <input
        type="number"
        name="year"
        id="year"
        class="form-control"
        value="<?= htmlspecialchars($formValues['year'] ?? '') ?>">
    </div>

    <div class="form-group mb-3">
      <label for="time">Durée (en minutes)</label>
      <input
        type="number"
        name="time"
        id="time"
        class="form-control"
        value="<?= htmlspecialchars($formValues['time'] ?? '') ?>">
    </div>

    <div class="form-group mb-3">
      <label for="id_category">Catégorie</label>
      <select name="id_category" id="id_category" class="form-control" required>
        <?php foreach ($categories as $category) { ?>
          <option
            value="<?= $category['id'] ?>"
            <?= $formValues['id_category'] == $category['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($category['cat_name']) ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="summary">Résumé</label>
      <textarea
        name="summary"
        id="summary"
        class="form-control"
        rows="4"><?= htmlspecialchars($formValues['summary'] ?? '') ?></textarea>
    </div>

    <div class="form-group mb-3">
      <label for="picture">URL de l'affiche</label>
      <input
        type="url"
        name="picture"
        id="picture"
        class="form-control"
        value="<?= htmlspecialchars($formValues['picture'] ?? '') ?>">
    </div>

    <div class="form-group mb-3">
      <label for="trailer">URL de la bande-annonce</label>
      <input
        type="url"
        name="trailer"
        id="trailer"
        class="form-control"
        value="<?= htmlspecialchars($formValues['trailer'] ?? '') ?>">
    </div>

    <button type="submit" class="btn btn-success">
      Enregistrer les modifications
    </button>

    <a href="?page=list" class="btn btn-secondary">
      Annuler
    </a>

  </form>

<?php } ?>