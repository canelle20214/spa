<?php
editProfileFunc();
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
				<button id="btn-profile" class="btn-nav-edit" >
					Profil
				</button>
			</li>
		</ul>
	</nav>
	<section id="profile" class="content current">
		<button onclick="location.href='<?= $router->generate('account')?>'">Annuler</button>
        <form id="form" action=<?= $router->generate('editprofile')?> method="POST">
            <div>
                <input type="text" name="edit-firstname" value=<?= $user->get_Firstname() ?> placeholder="Votre prénom" autocomplete="on" required/>
            </div>
            <div>
                <input type="text" name="edit-lastname" value=<?= $user->get_Lastname() ?> placeholder="Votre nom de famille" autocomplete="on" required/>
            </div>
            <div>
                <input type="email" name="edit-mail" value=<?= $user->get_Mail() ?> placeholder="Votre adresse mail" autocomplete="on" required/>
            </div>
            <div>
                <input type="tel" name="edit-phone" value=<?= $user->get_InputPhone() ?> placeholder="Votre numéro de téléphone" autocomplete="off" size="10" required/>
            </div>
            <button type="submit" name="submit" value="profile">
                Enregrister
            </button>
        </form>
    </section>
</main>