<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}
if (!isset($_SESSION['user'])) {
  header('Location: ?page=login');
  exit;
}

if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $summary = $_POST['summary'] ?: null;
  $year = $_POST['year'] ?: null;
  $time = $_POST['time'];
  $trailer = $_POST['trailer'] ?: null;
  $category = $_POST['category'];

  if (empty($title) || empty($category)) {
    $alertError = "Veuillez remplir tous les champs du formulaire";
  } else {

    // Conversion des minutes en format TIME pour MySQL (pour le champ durée du film)
    if ($_POST['time'] !== '') {
      $hours = intdiv((int)$_POST['time'], 60);
      $minutes = (int)$_POST['time'] % 60;
      $time = sprintf('%02d:%02d:00', $hours, $minutes);
    } else {
      $time = null;
    }

    try {
      $file = null;
      if (!empty($_FILES['picture']['name'])) {
        $imageFileType = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
        $targetDir = "public/picture/";
        $fileName = bin2hex(random_bytes(4)) . "." . $imageFileType;
        $targetFile = $targetDir . $fileName;

        if ($_FILES['picture']['error'] !== UPLOAD_ERR_OK) {
          $alertError = "Une erreur est survenue lors de l'envoi de votre image.";
        } elseif ($_FILES['picture']['size'] > 500000) {
          $alertError = "Le fichier est trop volumineux (max 500ko).";
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png'], true)) {
          $alertError = "Le fichier n'est pas une image, format accepté : jpg, jpeg, png.";
        } elseif (getimagesize($_FILES['picture']['tmp_name']) === false) {
          $alertError = "Le fichier n'est pas une image.";
        } elseif (file_exists($targetFile)) {
          $alertError = "Un fichier du même nom existe déjà.";
        } elseif (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
          $file = $fileName;
        } else {
          $alertError = "Une erreur est survenue lors de l'envoi de votre image.";
        }
      }

      if (!$alertError) {
        $request = $db->prepare('INSERT INTO movie (title, summary, movie_year, movie_time, trailer, picture, id_category) VALUES (?, ?, ?, ?, ?, ?, ?)');
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
      if (!empty($file) && file_exists("public/picture/" . $file)) {
        unlink("public/picture/" . $file);
      }
      echo 'Erreur :' . $e->getMessage();
      $alertError = "Une erreur est survenue lors de l'ajout de votre film.";
    }
  }
}

$categories = [];
try {
  $request = $db->query("SELECT * FROM category");
  $categories = $request->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Erreur :' . $e->getMessage();
  $alertError = "Impossible de récupérer les categories pour le moment.";
}

require_once 'partials/alert.php';
?>

<h1>Ajouter un film</h1>

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
        max="2155">
    </div>

    <div class="form-group col-md-6">
      <label for="time">Durée</label>
      <input
        type="number"
        class="form-control"
        id="time"
        name="time"
        placeholder="Ex : 120 minutes"
        min="1"
        max="240">
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
        <option value="<?= $cat['id'] ?>">
          <?= $cat['cat_name'] ?>
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
      placeholder="Décrivez brièvement l'histoire du film..."></textarea>
  </div>

  <div class="form-group">
    <label for="picture">Affiche du film</label>
    <input
      type="file"
      class="form-control"
      id="picture"
      name="picture"
      accept=".jpg,.jpeg,.png">
  </div>

  <div class="form-group">
    <label for="trailer">Lien de la bande-annonce</label>
    <input
      type="url"
      class="form-control"
      id="trailer"
      name="trailer"
      maxlength="255"
      placeholder="https://www.youtube.com/...">
  </div>

  <button type="submit" class="btn btn-outline-dark px-4">
    <i class="fas fa-plus mr-2"></i> Ajouter le film
  </button>
</form>