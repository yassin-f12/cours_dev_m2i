<form action="" method="GET" class="mb-4">
  <input type="hidden" name="page" value="list">

  <div class="form-row align-items-end">

    <div class="col-md-4 mb-2">
      <label for="search">Rechercher</label>
      <input
        type="text"
        name="search"
        id="search"
        class="form-control"
        placeholder="Titre du film..."
        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    </div>

    <div class="col-md-2 mb-2">
      <label for="category">Catégorie</label>
      <select name="category" id="category" class="form-control">
        <option value="">Toutes</option>

        <?php foreach ($categories as $category) { ?>
          <option
            value="<?= $category['id'] ?>"
            <?= (($_GET['category'] ?? '') == $category['id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($category['cat_name']) ?>
          </option>
        <?php } ?>

      </select>
    </div>

    <div class="col-md-2 mb-2">
      <label for="year">Année</label>
      <input
        type="number"
        name="year"
        id="year"
        class="form-control"
        placeholder="Ex : 2024"
        value="<?= htmlspecialchars($_GET['year'] ?? '') ?>">
    </div>

    <?php if (isset($_SESSION['user'])) { ?>
      <div class="col-md-2 mb-2">
        <label for="status">Statut</label>
        <select name="status" id="status" class="form-control">
          <option value="">Tous</option>
          <option value="1" <?= ($_GET['status'] ?? '') === '1' ? 'selected' : '' ?>>Vu</option>
          <option value="0" <?= ($_GET['status'] ?? '') === '0' ? 'selected' : '' ?>>À voir</option>
        </select>
      </div>
    <?php } ?>

    <div class="col-md-2 mb-2">
      <label for="sort">Trier par</label>
      <select name="sort" id="sort" class="form-control">
        <option value="title_asc" <?= ($_GET['sort'] ?? 'title_asc') === 'title_asc' ? 'selected' : '' ?>>Titre A-Z</option>
        <option value="title_desc" <?= ($_GET['sort'] ?? '') === 'title_desc' ? 'selected' : '' ?>>Titre Z-A</option>
        <option value="year_desc" <?= ($_GET['sort'] ?? '') === 'year_desc' ? 'selected' : '' ?>>Année récente</option>
        <option value="year_asc" <?= ($_GET['sort'] ?? '') === 'year_asc' ? 'selected' : '' ?>>Année ancienne</option>
        <option value="duration_asc" <?= ($_GET['sort'] ?? '') === 'duration_asc' ? 'selected' : '' ?>>Durée croissante</option>
        <option value="duration_desc" <?= ($_GET['sort'] ?? '') === 'duration_desc' ? 'selected' : '' ?>>Durée décroissante</option>
      </select>
    </div>

    <div class="col-md-2 mb-2">
      <div class="d-flex">
        <a href="?page=list" class="btn btn-outline-secondary mr-2">
          Réinitialiser
        </a>

        <button type="submit" class="btn btn-primary">
          Filtrer
        </button>
      </div>
    </div>
  </div>

</form>