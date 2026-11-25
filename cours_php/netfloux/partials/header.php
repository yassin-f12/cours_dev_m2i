<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="index.php">Netfloux</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link <?= $page === 'home' ? 'active' : '' ?>" href="?page=home">Accueil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= $page === 'add' ? 'active' : '' ?>" href="?page=add">Ajouter</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= $page === 'list' ? 'active' : '' ?>" href="?page=list">Liste</a>
          </li>

          <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_is_admin'] === 1) { ?>
            <li class="nav-item">
              <a class="nav-link <?= $page === 'category' ? 'active' : '' ?>" href="?page=category">
                Catégories
              </a>
            </li>
          <?php } ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Compte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (!isset($_SESSION['user'])) { ?>
                <a class="dropdown-item <?= $page === 'login' ? 'active' : '' ?>" href="?page=login">Connexion</a>
                <a class="dropdown-item <?= $page === 'register' ? 'active' : '' ?>" href="?page=register">Création de compte</a>
              <?php } else { ?>
                <a class="dropdown-item" href="index.php?logout=true">Déconnexion</a>
              <?php } ?>
            </div>
          </li>
          <?php if (isset($_SESSION['user'])) { ?>
            <li class="nav-item">
              <a class="nav-link disabled" href="#"><?= $_SESSION['user']['pseudo'] ?></a>
            </li>
          <?php } ?>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
            Rechercher
          </button>
        </form>
      </div>
    </nav>
  </header>

  <main class="container">