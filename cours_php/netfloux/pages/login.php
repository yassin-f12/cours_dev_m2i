<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    $alertError = "Merci de remplir tous les champs";
  } else {
    try {
      $request = $db->prepare("SELECT * FROM user WHERE user_email = ?");
      $request->execute([$email]);
      $user = $request->fetch();

      if (!$user || !password_verify($password, $user["user_password"])) {
        $alertError = "Email ou mot de passe incorrect";
      } else {
        $_SESSION["user"] = [
          "id" => $user['id'],
          "pseudo" => $user['pseudo'],
          "user_is_admin" => $user['user_is_admin']
        ];

        header('Location: ?page=list');
        exit;
      }
    } catch (PDOException $e) {
      echo 'Erreur :' . $e->getMessage();
    }
  }
}

require 'partials/alert.php';
?>

<form action="?page=login" method="post">


  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

      <div class="card shadow-sm mt-4">
        <div class="card-body p-4">

          <h1 class="h3 text-center mb-4">Se connecter</h1>

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

            <div class="input-group">
              <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Votre mot de passe"
                required>

              <div class="input-group-append">
                <button
                  class="btn"
                  type="button"
                  id="togglePassword">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">
            Se connecter
          </button>

        </div>
        <p class="ml-4">Nouveau ? <a href="?page=register">Créer mon compte</a></p>
      </div>

    </div>
  </div>


</form>