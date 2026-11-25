<?php
$movies = [];
$nbrMovies = 0;

try {
  $request = $db->query("
        SELECT movie.*, category.cat_name
        FROM movie
        INNER JOIN category ON movie.id_category = category.id
        ORDER BY movie.title ASC
    ");

  $movies = $request->fetchAll();
  $nbrMovies = count($movies);

  if ($nbrMovies > 0) {
    $plus = $nbrMovies > 1 ? 's' : '';
    $alertSuccess = "$nbrMovies film$plus trouvé$plus.";
  } else {
    $alertError = "Aucun film n'a été trouvé.";
  }
} catch (PDOException $e) {
  $alertError = "Impossible de récupérer les films pour le moment.";
}

if (isset($_SESSION['alertSuccess'])) {
  $alertSuccess = $_SESSION['alertSuccess'];
  $alertError = null;
  unset($_SESSION['alertSuccess']);
} elseif (isset($_SESSION['alertError'])) {
  $alertError = $_SESSION['alertError'];
  $alertSuccess = null;
  unset($_SESSION['alertError']);
}

require 'partials/alert.php';
?>

<h1 class="mb-4">Liste des films</h1>

<?php if ($nbrMovies > 0) { ?>

  <div class="row">

    <?php foreach ($movies as $movie) { ?>

      <div class="col-md-4 mb-4">

        <div class="card h-100 position-relative">

          <img src="public/picture/<?= htmlspecialchars($movie['picture']) ?>"
            class="card-img-top"
            alt="<?= $movie['title'] ?>"
            style="height: 190px; object-fit: cover;">

          <div class="card-body">

            <h5 class="card-title">
              <?= htmlspecialchars($movie['title']) ?>
            </h5>

            <p class="card-text">
              <?= $movie['cat_name'] ?>
            </p>

            <p class="card-text">
              <small class="text-muted">
                <?= htmlspecialchars($movie['movie_year']) ?? 'Année inconnue' ?> -
                <?= !empty(htmlspecialchars($movie['movie_time'])) ? substr(htmlspecialchars($movie['movie_time']), 0, 5) : 'Durée inconnue' ?>
              </small>
            </p>
            <?php if (isset($_SESSION['user'])) { ?>
              <a
                href="?page=update&id=<?= $movie['id'] ?>"
                class="btn btn-light position-absolute"
                style="top: 10px; right: 10px; z-index: 1;"
                title="Modifier le film">
                <i class="fa-solid fa-pen"></i>
              </a>
            <?php } ?>
            <div class="d-flex justify-content-between">
              <a href="?page=details&id=<?= $movie['id'] ?>" class="btn btn-primary">
                Voir détails
              </a>

              <?php if (!empty($movie['trailer'])) { ?>
                <a href="<?= htmlspecialchars($movie['trailer']) ?>" target="_blank" class="btn btn-info">
                  Bande-annonce
                </a>
              <?php } ?>

              <?php if (isset($_SESSION['user'])) { ?>
                <form action="?page=delete" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?')">
                  <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                  <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              <?php } ?>
            </div>


          </div>

        </div>

      </div>

    <?php } ?>

  </div>

<?php } ?>