<?php
$categories = [];
try {
  $request = $db->query("SELECT * FROM category");
  $categories = $request->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Erreur :' . $e->getMessage();
}

?>


<h1>Ajouter un film</h1>

<form class="form-film">
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
      name="id_category"
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