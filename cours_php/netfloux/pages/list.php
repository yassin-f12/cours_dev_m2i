<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}

$categories = [];
$movies = [];
$nbrMovies = 0;

$search = trim($_GET['search'] ?? '');
$category = $_GET['category'] ?? '';
$year = $_GET['year'] ?? '';
$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'title_asc';

try {
  $categories = $db->query("
    SELECT * FROM category
    ORDER BY cat_name ASC
  ")->fetchAll();

  $request = "
    SELECT movie.*, category.cat_name
    FROM movie
    INNER JOIN category ON movie.id_category = category.id
    WHERE 1 = 1
  ";

  $params = [];

  if ($search !== '') {
    $request = $request . " AND movie.title LIKE ?";
    $params[] = "%$search%";
  }

  if (is_numeric($category) && $category > 0) {
    $request = $request . " AND movie.id_category = ?";
    $params[] = $category;
  }

  if (ctype_digit((string) $year) && strlen((string) $year) === 4) {
    $request = $request . " AND movie.movie_year = ?";
    $params[] = $year;
  }

  if (isset($_SESSION['user']) && in_array($status, ['0', '1'], true)) {
    $request = $request . " AND movie.is_watched = ?";
    $params[] = $status;
  }

  $sortOptions = [
    'title_asc' => 'movie.title ASC',
    'title_desc' => 'movie.title DESC',
    'year_desc' => 'movie.movie_year DESC',
    'year_asc' => 'movie.movie_year ASC',
    'duration_asc' => 'movie.movie_time ASC',
    'duration_desc' => 'movie.movie_time DESC'
  ];

  $orderBy = $sortOptions[$sort] ?? 'movie.title ASC';

  $request = $request . " ORDER BY " . $orderBy;

  $request = $db->prepare($request);
  $request->execute($params);

  $movies = $request->fetchAll();

  if (count($movies) > 0) {
    $nbrMovies = count($movies);
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

<?php require 'partials/filters.php'; ?>

<?php if ($nbrMovies > 0) { ?>

  <div class="row">

    <?php foreach ($movies as $movie) { ?>

      <div class="col-md-4 mb-4">

        <div class="card h-100 position-relative">

          <?php if (!empty($movie['picture'])) { ?>
            <img
              src="public/picture/<?= htmlspecialchars($movie['picture']) ?>"
              class="card-img-top"
              alt="<?= htmlspecialchars($movie['title']) ?>"
              style="height: 190px; object-fit: cover;">
          <?php } else { ?>
            <div class="movie-placeholder">
              <i class="fa-solid fa-film"></i>
            </div>
          <?php } ?>

          <?php if (isset($_SESSION['user'])) { ?>
            <span class="badge badge-status <?= $movie['is_watched'] ? 'badge-success' : 'badge-warning' ?>">
              <?= $movie['is_watched'] ? 'Vu' : 'À voir' ?>
            </span>
          <?php } ?>

          <div class="card-body">

            <h5 class="card-title">
              <?= htmlspecialchars($movie['title']) ?>
            </h5>

            <p class="card-text">
              <?= htmlspecialchars($movie['cat_name']) ?>
            </p>

            <div class="card-text d-flex justify-content-between align-items-center mb-3">
              <small class="text-muted">
                <?= htmlspecialchars($movie['movie_year'] ?? 'Année inconnue') ?> -

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
              </small>

              <div class="movie-rating">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                  if ($i <= $movie['rank']) {
                    echo '★';
                  } else {
                    echo '☆';
                  }
                }
                ?>
              </div>
            </div>

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
                <form
                  action="?page=delete"
                  method="POST"
                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?')">

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