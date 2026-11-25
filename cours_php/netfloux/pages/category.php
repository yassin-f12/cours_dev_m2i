<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}

$categoryToEdit = null;
$clearInput = false;

if (isset($_GET['edit'])) {
  $id = filter_var($_GET['edit'], FILTER_VALIDATE_INT);

  if ($id !== false && $id > 0) {
    $request = $db->prepare("
      SELECT *
      FROM category
      WHERE id = ?
    ");

    $request->execute([$id]);
    $categoryToEdit = $request->fetch();

    if (!$categoryToEdit) {
      $alertError = "Catégorie introuvable.";
    }
  }
}

if (isset($_POST['add'])) {
  $catName = trim($_POST['cat_name'] ?? '');

  if (empty($catName)) {
    $alertError = "Veuillez renseigner un nom de catégorie.";
  } else {
    try {
      $request = $db->prepare("
        SELECT id
        FROM category
        WHERE cat_name = ?
      ");

      $request->execute([$catName]);
      $categoryExists = $request->fetch();

      if ($categoryExists) {
        $alertError = "Cette catégorie existe déjà.";
      } else {
        $request = $db->prepare("
          INSERT INTO category (cat_name)
          VALUES (?)
        ");

        $request->execute([$catName]);

        $clearInput = true;
        $alertSuccess = "La catégorie a bien été ajoutée.";
      }
    } catch (PDOException $e) {
      $alertError = "Impossible d'ajouter la catégorie.";
    }
  }
}

if (isset($_POST['update'])) {
  $id = filter_var($_POST['id'] ?? '', FILTER_VALIDATE_INT);
  $catName = trim($_POST['cat_name'] ?? '');

  if ($id === false || $id <= 0) {
    $alertError = "Catégorie invalide.";
  } elseif (empty($catName)) {
    $alertError = "Veuillez renseigner un nom de catégorie.";
  } else {
    try {
      $request = $db->prepare("
        SELECT id
        FROM category
        WHERE cat_name = ? AND id != ?
      ");

      $request->execute([$catName, $id]);
      $categoryExists = $request->fetch();

      if ($categoryExists) {
        $alertError = "Ce nom de catégorie est déjà utilisé.";
      } else {
        $request = $db->prepare("
          UPDATE category
          SET cat_name = ?
          WHERE id = ?
        ");

        $request->execute([$catName, $id]);

        $categoryToEdit = null;
        $clearInput = true;
        $alertSuccess = "La catégorie a bien été modifiée.";
      }
    } catch (PDOException $e) {
      $alertError = "Impossible de modifier la catégorie.";
    }
  }
}

if (isset($_POST['archive'])) {
  $id = filter_var($_POST['id'] ?? '', FILTER_VALIDATE_INT);

  if ($id !== false && $id > 0) {
    try {
      $request = $db->prepare("
        UPDATE category
        SET category_is_archived = 1
        WHERE id = ?
      ");

      $request->execute([$id]);

      $alertSuccess = "La catégorie a bien été archivée.";
    } catch (PDOException $e) {
      $alertError = "Impossible d'archiver la catégorie.";
    }
  } else {
    $alertError = "Catégorie invalide.";
  }
}

if (isset($_POST['unarchive'])) {
  $id = filter_var($_POST['id'] ?? '', FILTER_VALIDATE_INT);

  if ($id !== false && $id > 0) {
    try {
      $request = $db->prepare("
        UPDATE category
        SET category_is_archived = 0
        WHERE id = ?
      ");

      $request->execute([$id]);

      $alertSuccess = "La catégorie a bien été désarchivée.";
    } catch (PDOException $e) {
      $alertError = "Impossible de désarchiver la catégorie.";
    }
  } else {
    $alertError = "Catégorie invalide.";
  }
}

$categories = [];

try {
  $request = $db->query("
    SELECT *
    FROM category
    ORDER BY cat_name ASC
  ");

  $categories = $request->fetchAll();
} catch (PDOException $e) {
  $alertError = "Impossible de récupérer les catégories.";
}

require 'partials/alert.php';
?>

<h1>Administration des catégories</h1>

<h2 class="h4 mt-4">
  <?= $categoryToEdit ? 'Modifier une catégorie' : 'Ajouter une catégorie' ?>
</h2>

<form action="" method="POST" class="mb-4">

  <?php if ($categoryToEdit) { ?>
    <input
      type="hidden"
      name="id"
      value="<?= $categoryToEdit['id'] ?>">
  <?php } ?>

  <div class="form-row align-items-end">

    <div class="form-group col-md-6">
      <label for="cat_name">Nom de la catégorie</label>
      <input
        type="text"
        name="cat_name"
        id="cat_name"
        class="form-control"
        placeholder="Ex : Animation"
        maxlength="80"
        value="<?= htmlspecialchars($clearInput ? '' : ($categoryToEdit['cat_name'] ?? $_POST['cat_name'] ?? '')) ?>"
        required>
    </div>

    <div class="form-group col-md-3">
      <?php if ($categoryToEdit) { ?>
        <button type="submit" name="update" class="btn btn-primary">
          Modifier
        </button>

        <a href="?page=category" class="btn btn-secondary">
          Annuler
        </a>
      <?php } else { ?>
        <button type="submit" name="add" class="btn btn-primary">
          Ajouter
        </button>
      <?php } ?>
    </div>

  </div>
</form>

<div class="row">
  <?php foreach ($categories as $category) { ?>
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body d-flex justify-content-between align-items-center">

          <div>
            <h5 class="card-title mb-1">
              <?= htmlspecialchars($category['cat_name']) ?>
            </h5>

            <?php if ($category['category_is_archived'] == 1) { ?>
              <span class="badge badge-secondary">Archivée</span>
            <?php } else { ?>
              <span class="badge badge-success">Active</span>
            <?php } ?>
          </div>

          <div class="d-flex align-items-center">

            <a
              href="?page=category&edit=<?= $category['id'] ?>"
              class="btn btn-outline-primary btn-sm mr-2">
              Modifier
            </a>

            <form action="" method="POST">
              <input
                type="hidden"
                name="id"
                value="<?= $category['id'] ?>">

              <?php if ($category['category_is_archived'] == 1) { ?>
                <button
                  type="submit"
                  name="unarchive"
                  class="btn btn-outline-success btn-sm">
                  Désarchiver
                </button>
              <?php } else { ?>
                <button
                  type="submit"
                  name="archive"
                  class="btn btn-outline-secondary btn-sm">
                  Archiver
                </button>
              <?php } ?>
            </form>

          </div>

        </div>
      </div>
    </div>
  <?php } ?>
</div>