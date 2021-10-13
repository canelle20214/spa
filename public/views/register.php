<?php
  registerFunc();
?>
<main>
 <?php require "layout" . DIRECTORY_SEPARATOR . "messages.php"; ?>
  <form id="form" action=<?= $router->generate('register')?> method="POST">
    <h2>
      Inscription
    </h2>
    <div>
      <label for="input-firstname">Prénom :</label>
      <input type="text" name="user-firstname" placeholder="Votre prénom" autocomplete="off" id="input-firstname" required/>
    </div>
    <div>
      <label for="input-lastname">Nom :</label>
      <input type="text" name="user-lastname" placeholder="Votre nom de famille" autocomplete="off" id="input-lastname" required/>
    </div>
    <div>
      <label for="input-mail">Email :</label>
      <input type="email" name="user-mail" placeholder="Votre adresse mail" autocomplete="off" id="input-mail" required/>
    </div>
    <div>
      <label for="input-password">Mot de passe :</label>
      <input type="password" name="user-password" placeholder="Votre mot de passe" autocomplete="off" id="input-password" required/>
    </div>
    <div class="without-label">
      <input type="password" name="user-password-confirm" placeholder="Confirmez votre mot de passe" autocomplete="off" required/>
    </div>
    <div>
      <label for="input-phone">Numéro de téléphone :</label>
      <input type="tel" name="user-phone" placeholder="Votre numéro de téléphone" autocomplete="off" size="10" id="input-phone" required/>
    </div>
    <div class="terms">
      <input type="checkbox" name="user-terms"> J'accepte les conditions générales d'utilisation.
    </div>
    <a id="login" class="tertiary" href=<?= $router->generate('login')?>>
      Déjà inscrit ?
    </a>
    <button type="submit">
      S'inscrire
    </button>
  </form>
</main>