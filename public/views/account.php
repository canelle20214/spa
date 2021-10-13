<?php
redirect_unconnected_user();
$user = getCurrentUser();
?>
<main id="account">
	<h1>
		Votre compte
	</h1>
	<nav>
		<ul>
			<li>
				<button id="btn-profile" class="btn-nav" onclick="changeSection('profile')">
					Profil
				</button>
			</li>
		</ul>
	</nav>
	<section id="profile" class="content current">
		<div class="grid-columns">
			<button onclick="location.href='<?= $router->generate('editpassword')?>'">Changer de mot de passe</button>
			<button onclick="location.href='<?= $router->generate('editprofile')?>'">Éditer le profil</button>
		</div>
		<ul>
			<li class="capitalize">
				<?= $user->get_Firstname() ?>
			</li>
			<li class="capitalize">
				<?= $user->get_Lastname() ?>
			</li>
			<li>
				<?= $user->get_Mail() ?>
			</li>
			<li>
				<?= $user->get_Phone() ?>
			</li>
		</ul>
	</section>
</main>