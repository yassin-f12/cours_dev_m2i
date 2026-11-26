<div class="text-center py-5">
  <h1 class="display-4 font-weight-bold">Bienvenue sur Netfloux !</h1>

  <p class="lead text-muted mt-3">
    Retrouvez tous vos films préférés au même endroit.
    Gérez votre collection et gardez une trace des films que vous avez regardés.
  </p>

  <div class="mt-4">
    <a href="?page=list" class="btn btn-dark btn-lg mr-2">
      <i class="fas fa-film mr-2"></i>
      Découvrir les films
    </a>

    <?php if (isset($_SESSION['user'])) { ?>
      <a href="?page=add" class="btn btn-outline-dark btn-lg">
        <i class="fas fa-plus mr-2"></i>
        Ajouter un film
      </a>
    <?php } ?>
  </div>
</div>

<div class="row mt-5 text-center">
  <div class="col-md-4 mb-4">
    <i class="fas fa-film fa-3x mb-3"></i>
    <h4>Votre collection</h4>
    <p class="text-muted">
      Retrouvez facilement tous les films enregistrés.
    </p>
  </div>

  <div class="col-md-4 mb-4">
    <i class="fas fa-eye fa-3x mb-3"></i>
    <h4>Votre suivi</h4>
    <p class="text-muted">
      Gardez une trace des films que vous avez déjà regardés.
    </p>
  </div>

  <div class="col-md-4 mb-4">
    <i class="fas fa-tags fa-3x mb-3"></i>
    <h4>Vos catégories</h4>
    <p class="text-muted">
      Retrouvez vos films selon leur genre.
    </p>
  </div>
</div>