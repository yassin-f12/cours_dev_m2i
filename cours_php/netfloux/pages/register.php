<?php
if (!defined('NETFLOUX')) {
  http_response_code(403);
  exit('Accès interdit');
}
const PASSWORD_MIN_LENGTH = 8;

if (isset($_POST["pseudo"])) {
  $pseudo = $_POST["pseudo"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  if (empty($pseudo) || empty($email) || empty($password)) {
    $alertError = "Merci de remplir tous les champ";
  } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $alertError = "Merci de renseigner une adresse email valide.";
  } elseif (mb_strlen($password) < PASSWORD_MIN_LENGTH) {
    $alertError = "Le mot de passe doit contenir au moins " . PASSWORD_MIN_LENGTH . " caractères !";
  } else {
    try {
      $request = $db->prepare("SELECT * FROM user WHERE user_email = ? OR pseudo = ?");
      $request->execute([$email, $pseudo]);
      $user = $request->fetch();

      if ($user) {
        $alertError = "Un compte existe déjà avec ce pseudo ou email !";
      } else {
        $id = bin2hex(random_bytes(4)); // va générer 8 caractères

        $pswdHash = password_hash($password, PASSWORD_DEFAULT);

        $request = $db->prepare("INSERT INTO user (id, pseudo, user_email, user_password) VALUES (?, ?, ?, ?)");
        $request->execute([$id, $pseudo, $email, $pswdHash]);

        $_SESSION["user"] = [
          "id" => $id,
          "pseudo" => $pseudo,
        ];

        header('Location: ?page=list');
        exit;
      }
    } catch (PDOException $e) {
      echo 'Erreur : ' . $e->getMessage();
    }
  }
}

require 'partials/alert.php';
?>

<form action="?page=register" method="post">


  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">

      <div class="card shadow-sm mt-4">
        <div class="card-body p-4">

          <h1 class="h3 text-center mb-4">Créer un compte</h1>

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

        </div>
        <p class="ml-4">Déjà un compte ? <a href="?page=login">Se connecter</a></p>
      </div>

    </div>
  </div>


</form>