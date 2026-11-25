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

    if (isset($_POST['save_rank']) && isset($_SESSION['user'])) {

      $rank = filter_var($_POST['rank'], FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 5]
      ]);

      if ($rank === false) {
        $alertError = "La note doit être un nombre entier entre 1 et 5.";
      } else {
        $request = $db->prepare("
          UPDATE movie
          SET `rank` = ?
          WHERE id = ?
        ");

        $request->execute([$rank, $id]);

        $alertSuccess = "La note a bien été modifiée.";
      }
    }

    if (isset($_POST['toggle_watched']) && isset($_SESSION['user'])) {

      $request = $db->prepare("
        UPDATE movie
        SET is_watched = 1 - is_watched
        WHERE id = ?
      ");

      $request->execute([$id]);

      $alertSuccess = "Le statut du film a bien été modifié.";
    }

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
    }
  } catch (PDOException $e) {
    $alertError = "Impossible de récupérer ou modifier les informations du film.";
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
            <?php
            if (!empty($movie['movie_time'])) {
              $hours = (int) substr($movie['movie_time'], 0, 2);
              $minutes = (int) substr($movie['movie_time'], 3, 2);

              if ($hours > 0 && $minutes > 0) {
                echo $hours . 'h' . $minutes;
              } elseif ($hours > 0) {
                echo $hours . 'h';
              } else {
                echo $minutes . 'min';
              }
            } else {
              echo 'Durée inconnue';
            }
            ?>
          </p>

          <?php if (isset($_SESSION['user'])) { ?>

            <form action="" method="POST" class="mb-3">

              <div class="form-group">
                <label for="rank">Note du film</label>

                <select name="rank" id="rank" class="form-control">
                  <?php for ($i = 1; $i <= 5; $i++) { ?>
                    <option value="<?= $i ?>" <?= $movie['rank'] == $i ? 'selected' : '' ?>>
                      <?= $i ?> / 5
                    </option>
                  <?php } ?>
                </select>
              </div>

              <button type="submit" name="save_rank" class="btn btn-outline-dark">
                Enregistrer la note
              </button>

            </form>

          <?php } ?>



          <?php if (isset($_SESSION['user'])) { ?>

            <form action="" method="POST" class="mb-3">

              <?php if ($movie['is_watched'] == 0) { ?>

                <button type="submit" name="toggle_watched" class="btn btn-success">
                  Marquer comme vu
                </button>

              <?php } else { ?>

                <button type="submit" name="toggle_watched" class="btn btn-warning">
                  Marquer comme non vu
                </button>

              <?php } ?>

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

          <?php if (!empty($movie['trailer'])) { ?>
            <div class="mt-3 mb-3">
              <h5>Bande-annonce</h5>

              <iframe
                width="100%"
                height="315"
                src="https://www.youtube.com/embed/<?= htmlspecialchars($movie['trailer']) ?>"
                title="Bande-annonce du film"
                frameborder="0"
                allowfullscreen>
              </iframe>
            </div>
          <?php } ?>

        </div>
      </div>

    </div>
  </div>

<?php } ?>