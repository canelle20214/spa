<?php
editPasswordFunc();
$user = getCurrentUser();
require "layout" . DIRECTORY_SEPARATOR . "messages.php";
?>
<main id="account">
	<h1>
		Votre compte
	</h1>
	<nav>
		<ul>
			<li>
				<button id="btn-profile" class="btn-nav-edit current" >
					Profil
				</button>
			</li>
		</ul>
	</nav>
	<section id="profile" class="content current">
		<button onclick="location.href='<?= $router->generate('account')?>'">Annuler</button>
        <form id="form" action=<?= $router->generate('editpassword')?> method="POST">
            <div class="grid-rows">
                <label for="input-oldpassword">Ancien mot de passe :</label>
                <input type="password" name="old-password" placeholder="Votre mot de passe" autocomplete="off" id="input-oldpassword" required/>
            </div>
            <div class="grid-rows">
                <label for="input-password">Nouveau mot de passe :</label>
                <input type="password" name="edit-password" placeholder="Votre nouveau mot de passe" autocomplete="off" id="input-password" required/>
            </div>
            <div class="without-label">
                <input type="password" name="edit-password-confirm" placeholder="Confirmez votre nouveau mot de passe" autocomplete="off" required/>
            </div>
            <button type="submit" name="submit" value="password">
                Enregrister
            </button>
        </form>
    </section>
</main>