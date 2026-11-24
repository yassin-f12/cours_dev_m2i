<?php
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $summary = $_POST['summary'];
  $year = $_POST['year'];
  $time = $_POST['time'];
  $trailer = $_POST['trailer'];
  $picture = $_POST['picture'];
  $category = $_POST['category'];

  if (empty($title) || empty($summary) || empty($year) || empty($time) || empty($picture) || empty($trailer) || empty($category)) {
    $alertError = "Veuillez remplir tous les champs du formulaire";
  } else {
    // Conversion des minutes en format TIME pour MySQL (pour le champ durée du film)
    $hours = intdiv($time, 60);
    $minutes = $time % 60;
    $time = sprintf('%02d:%02d:00', $hours, $minutes);

    try {
      $request = $db->prepare('INSERT INTO movie (title, summary, movie_year, movie_time, trailer, picture, id_category) VALUES (?, ?, ?, ?, ?, ?, ?)');
      $request->execute([
        $title,
        $summary,
        $year,
        $time,
        $trailer,
        $picture,
        $category
      ]);
      $alertSuccess = "Votre film $title a bien été ajouté !";
    } catch (PDOException $e) {
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

<form class="form-film" action="" method="post">
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
      type="text"
      class="form-control"
      id="picture"
      name="picture"
      maxlength="80"
      placeholder="Nom ou chemin de l'image">
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