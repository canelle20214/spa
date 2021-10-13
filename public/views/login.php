<?php
  if(isset($_POST['current-mail']) && isset($_POST['current-password'])){
    var_dump($_POST['current-mail']);
    var_dump($_POST['current-password']);
    $user = getUserByMail($_POST['current-mail']);
    var_dump($user->get_Password());
    var_dump(strlen($user->get_Password()));
    var_dump(isMailMatchsPassword($_POST['current-mail'], $_POST['current-password']));
  }
  loginFunc();
?>
<main>
  <?php require "layout" . DIRECTORY_SEPARATOR . "messages.php"; ?>
  <form id="form" action=<?= $router->generate('login')?> method="POST">
    <h2>
      Connectez-vous
    </h2>
    <div>
      <input type="email" name="current-mail" placeholder="Votre adresse mail" autocomplete="on" />
    </div>
    <div>
      <input type="password" name="current-password" placeholder="Votre mot de passe" autocomplete="on" />
    </div>
    <a id="register" class="tertiary" href=<?= $router->generate('register')?>>
      Pas encore inscrit ?
    </a>
    <button type="submit">
      Se connecter
    </button>
  </form>
</main>