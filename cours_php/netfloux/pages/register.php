<?php
require 'partials/alert.php';
?>

<h1 class="mb-4">Création de compte</h1>

<form action="?page=register" method="POST">


  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

      <div class="card shadow-sm mt-4">
        <div class="card-body p-4">

          <h1 class="h3 text-center mb-4">Créer un compte</h1>

          <form action="?page=register" method="POST">

            <div class="form-group mb-3">
              <label for="pseudo">Pseudo</label>
              <input
                type="text"
                name="pseudo"
                id="pseudo"
                class="form-control"
                placeholder="Votre pseudo"
                required>
            </div>

            <div class="form-group mb-3">
              <label for="email">Adresse mail</label>
              <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                placeholder="exemple@mail.com"
                required>
            </div>

            <div class="form-group mb-4">
              <label for="password">Mot de passe</label>
              <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Votre mot de passe"
                required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">
              Créer mon compte
            </button>

          </form>

        </div>
      </div>

    </div>
  </div>


</form>