<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}
$id = $_GET['id'] ?? null;
$movie = null;
$alertError = null;

if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
  $alertError = "Identifiant du film invalide.";
} else {
  try {
    $request = $db->prepare("
            SELECT movie.*, category.cat_name
            FROM movie
            INNER JOIN category ON movie.id_category = category.id
            WHERE movie.id = ?
        ");

    $request->execute([$id]);
    $movie = $request->fetch();

    if (!$movie) {
      $alertError = "Film introuvable.";
    } elseif (isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $isWatched = $_POST['is_watched'] ?? null;
      $isWatched = filter_var($isWatched, FILTER_VALIDATE_INT);

      if ($isWatched !== false && in_array($isWatched, [0, 1], true)) {
        $request = $db->prepare("
                    UPDATE movie
                    SET is_watched = ?
                    WHERE id = ?
                ");

        $request->execute([$isWatched, $id]);

        $movie['is_watched'] = $isWatched;
        $alertSuccess = "Le statut du film a été modifié.";
      } else {
        $alertError = "Statut du film invalide.";
      }
    }
  } catch (PDOException $e) {
    $alertError = "Impossible de récupérer les informations du film.";
  }
}

require 'partials/alert.php';

?>

<?php if ($movie) { ?>

  <div class="card shadow-sm mt-4">
    <div class="row no-gutters">

      <div class="col-md-5">
        <?php if (!empty($movie['picture'])) { ?>
          <img src="public/picture/<?= htmlspecialchars($movie['picture']) ?>"
            class="card-img h-100"
            style="object-fit: cover;"
            alt="<?= htmlspecialchars($movie['title']) ?>">
        <?php } ?>
      </div>

      <div class="col-md-7">
        <div class="card-body">

          <h1 class="card-title">
            <?= htmlspecialchars($movie['title']) ?>
          </h1>

          <p class="text-muted">
            <?= htmlspecialchars($movie['cat_name']) ?>
          </p>

          <hr>

          <p>
            <strong>Année :</strong>
            <?= $movie['movie_year'] ?: 'Non renseignée' ?>
          </p>

          <p>
            <strong>Durée :</strong>
            <?= !empty($movie['movie_time'])
              ? substr($movie['movie_time'], 0, 5)
              : 'Non renseignée' ?>
          </p>

          <?php if (isset($_SESSION['user'])) { ?>
            <form action="?page=details&id=<?= $id ?>" method="POST">
              <div class="form-group">
                <label for="is_watched">Statut du film</label>

                <select class="form-control" name="is_watched" id="is_watched">
                  <option value="0" <?= $movie['is_watched'] == 0 ? 'selected' : '' ?>>
                    À voir
                  </option>

                  <option value="1" <?= $movie['is_watched'] == 1 ? 'selected' : '' ?>>
                    Vu
                  </option>
                </select>
              </div>

              <button type="submit" class="btn btn-outline-dark">
                Modifier le statut
              </button>
            </form>
          <?php } ?>

          <hr>

          <h5>Synopsis</h5>

          <p>
            <?= !empty($movie['summary'])
              ? nl2br(htmlspecialchars($movie['summary']))
              : 'Aucun résumé disponible.' ?>
          </p>

          <div class="d-flex align-items-center flex-wrap">

            <?php if (!empty($movie['trailer'])) { ?>
              <a
                href="<?= htmlspecialchars($movie['trailer']) ?>"
                target="_blank"
                rel="noopener noreferrer"
                class="btn btn-info mr-2 mb-2">
                <i class="fa-solid fa-film"></i>
                Voir la bande-annonce
              </a>
            <?php } ?>

            <?php if (isset($_SESSION['user'])) { ?>

              <a
                href="?page=update&id=<?= $movie['id'] ?>"
                class="btn btn-warning mr-2 mb-2">
                <i class="fa-solid fa-pen"></i>
                Modifier
              </a>

              <form action="?page=delete" method="POST" class="mr-2 mb-2"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?')">

                <input type="hidden" name="id" value="<?= $movie['id'] ?>">

                <button type="submit" class="btn btn-danger">
                  <i class="fa-solid fa-trash"></i>
                  Supprimer
                </button>
              </form>

            <?php } ?>

            <a href="?page=list" class="btn btn-secondary mb-2">
              Retour à la liste
            </a>

          </div>

        </div>
      </div>

    </div>
  </div>

<?php } ?>