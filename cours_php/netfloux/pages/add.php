<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}
if (!isset($_SESSION['user'])) {
  header('Location: ?page=login');
  exit;
}

$isEdit = false;
$movie = null;

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

  if ($id === false || $id === null || $id <= 0) {
    $alertError = "Identifiant de film invalide.";
  } else {
    $request = $db->prepare("SELECT * FROM movie WHERE id = ?");
    $request->execute([$id]);
    $movie = $request->fetch();

    if (!$movie) {
      $alertError = "Film introuvable.";
    } else {
      $isEdit = true;
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $title = trim($_POST['title'] ?? '');
  $summary = $_POST['summary'] ?: null;
  $year = $_POST['year'] ?: null;
  $time = $_POST['time'] ?: null;
  $trailer = $_POST['trailer'] ?: null;
  $category = $_POST['category'];

  if (empty($title) || empty($category)) {
    $alertError = "Veuillez remplir tous les champs obligatoires.";
  } else {

    $file = $isEdit ? $movie['picture'] : null;
    $newFile = null;

    try {

      if (!empty($_FILES['picture']['name'])) {

        $imageFileType = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
        $targetDir = "public/picture/";
        $fileName = bin2hex(random_bytes(4)) . "." . $imageFileType;
        $targetFile = $targetDir . $fileName;

        if ($_FILES['picture']['error'] !== UPLOAD_ERR_OK) {
          throw new Exception("Une erreur est survenue lors de l'envoi de votre image.");
        } elseif ($_FILES['picture']['size'] > 500000) {
          throw new Exception("Le fichier est trop volumineux (max 500ko).");
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'], true)) {
          throw new Exception("Format accepté : jpg, jpeg, png.");
        } elseif (getimagesize($_FILES['picture']['tmp_name']) === false) {
          throw new Exception("Le fichier n'est pas une image.");
        } elseif (file_exists($targetFile)) {
          throw new Exception("Un fichier du même nom existe déjà.");
        } elseif (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
          $file = $fileName;
          $newFile = $fileName;
        } else {
          throw new Exception("Une erreur est survenue lors de l'envoi de votre image.");
        }
      } elseif ($isEdit && isset($_POST['delete_picture'])) {

        $file = null;
      }

      if ($time !== null) {
        $time .= ':00';
      }

      if ($isEdit) {

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
          $title,
          $summary,
          $year,
          $time,
          $trailer,
          $file,
          $category,
          $id
        ]);

        $oldPicture = $movie['picture'];

        if ($file !== $oldPicture && !empty($oldPicture)) {
          $oldFile = "public/picture/" . $oldPicture;

          if (file_exists($oldFile)) {
            unlink($oldFile);
          }
        }

        header('Location: ?page=details&id=' . $id);
        exit;
      } else {

        $request = $db->prepare("
          INSERT INTO movie
          (title, summary, movie_year, movie_time, trailer, picture, id_category)
          VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $request->execute([
          $title,
          $summary,
          $year,
          $time,
          $trailer,
          $file,
          $category
        ]);

        $alertSuccess = "Votre film $title a bien été ajouté !";
      }
    } catch (PDOException $e) {

      if ($newFile && file_exists("public/picture/" . $newFile)) {
        unlink("public/picture/" . $newFile);
      }

      $alertError = "Une erreur est survenue lors de l'enregistrement du film.";
    } catch (Exception $e) {

      $alertError = $e->getMessage();
    }
  }
}

$categories = [];
try {
  if ($isEdit) {
    $request = $db->prepare("
    SELECT *
    FROM category
    WHERE category_is_archived = 0 OR id = ?
    ORDER BY cat_name ASC
  ");

    $request->execute([$movie['id_category']]);
  } else {
    $request = $db->query("
    SELECT *
    FROM category
    WHERE category_is_archived = 0
    ORDER BY cat_name ASC
  ");
  }

  $categories = $request->fetchAll();
} catch (PDOException $e) {
  echo 'Erreur :' . $e->getMessage();
  $alertError = "Impossible de récupérer les categories pour le moment.";
}

require_once 'partials/alert.php';
?>

<h1><?= $isEdit ? 'Modifier un film' : 'Ajouter un film' ?></h1>

<form class="form-film" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Titre du film *</label>
    <input
      type="text"
      class="form-control"
      id="title"
      name="title"
      placeholder="Ex : Interstellar"
      maxlength="80"
      value="<?= htmlspecialchars($movie['title'] ?? '') ?>"
      required>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="year">Année de sortie</label>
      <input
        type="number"
        class="form-control"
        id="year"
        name="year"
        placeholder="Ex : 2014"
        min="1888"
        max="2155"
        value="<?= htmlspecialchars($movie['movie_year'] ?? '') ?>">
    </div>

    <div class="form-group col-md-6">
      <label for="time">Durée</label>
      <input
        type="time"
        class="form-control"
        id="time"
        name="time"
        value="<?= htmlspecialchars(isset($movie['movie_time']) ? substr($movie['movie_time'], 0, 5) : '') ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="category">Catégorie *</label>
    <select
      class="form-control"
      id="category"
      name="category"
      required>
      <option value="">Choisir une catégorie</option>
      <?php foreach ($categories as $cat) { ?>
        <option
          value="<?= $cat['id'] ?>"
          <?= isset($movie['id_category']) && $movie['id_category'] == $cat['id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($cat['cat_name']) ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="summary">Synopsis</label>
    <textarea
      class="form-control"
      id="summary"
      name="summary"
      rows="4"
      placeholder="Décrivez brièvement l'histoire du film..."><?= htmlspecialchars($movie['summary'] ?? '') ?></textarea>
  </div>

  <div class="form-group">
    <label for="picture">Affiche du film</label>

    <?php if ($isEdit && !empty($movie['picture'])) { ?>
      <div class="mb-2">
        <img
          src="public/picture/<?= htmlspecialchars($movie['picture']) ?>"
          alt="Affiche actuelle"
          style="width: 120px; height: 160px; object-fit: cover;">
      </div>
    <?php } ?>

    <input
      type="file"
      class="form-control"
      id="picture"
      name="picture"
      accept=".jpg,.jpeg,.png">
  </div>

  <?php if ($isEdit && !empty($movie['picture'])) { ?>
    <div class="form-group">
      <div class="form-check">
        <input
          type="checkbox"
          class="form-check-input"
          id="delete_picture"
          name="delete_picture"
          value="1">

        <label class="form-check-label" for="delete_picture">
          Supprimer l'affiche actuelle
        </label>
      </div>
    </div>
  <?php } ?>

  <div class="form-group">
    <label for="trailer">Identifiant de la bande-annonce YouTube</label>
    <input
      type="text"
      class="form-control"
      id="trailer"
      name="trailer"
      maxlength="20"
      placeholder="Ex : 7CWqC3j7Y14"
      value="<?= htmlspecialchars($movie['trailer'] ?? '') ?>">
  </div>

  <button type="submit" class="btn btn-outline-dark px-4">
    <?php if ($isEdit) { ?>
      <i class="fas fa-save mr-2"></i> Enregistrer les modifications
    <?php } else { ?>
      <i class="fas fa-plus mr-2"></i> Ajouter le film
    <?php } ?>
  </button>
</form>