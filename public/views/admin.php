<?php
  adminFunc();
?>
<main>
  <?php require "layout" . DIRECTORY_SEPARATOR . "messages.php"; ?>
  <form id="form" action=<?= $router->generate('admin')?> method="POST">
    <h2>
      Connectez-vous
    </h2>
    <div>
      <input type="text" name="current-login" placeholder="Votre identifiant" autocomplete="on" />
    </div>
    <div>
      <input type="password" name="current-password" placeholder="Votre mot de passe" autocomplete="on" />
    </div>
    <button type="submit">
      Se connecter
    </button>
  </form>
</main>