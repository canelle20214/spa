<?php
if(!is_connected_user() && !is_connected_admin()){
	redirect_unconnected_user();
}elseif(is_connected_user()){
	$user = getCurrentUser();
}else{
	$admin = getCurrentAdmin();
	$animals = getAllAnimals();
	$admins = getAllAdmins();
}
?>
<main id="account">
	<h1>
		Votre compte
	</h1>
	<?php if(isset($user)) : ?>
		<nav>
			<ul>
				<li>
					<button id="btn-profile" class="btn-nav">
						Profil
					</button>
				</li>
			</ul>
		</nav>
		<section id="profile" class="content">
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
	<?php else : ?>
		<nav>
			<ul>
				<li>
					<button id="btn-profile" class="btn-nav current" onclick="changeSection('profile')">
						Profil
					</button>
				</li>
				<li>
					<button id="btn-animals" class="btn-nav" onclick="changeSection('animals')">
						Animals
					</button>
				</li>
				<li>
					<button id="btn-admins" class="btn-nav" onclick="changeSection('admins')">
						Admins
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
					<?= $admin->get_Login() ?>
				</li>
			</ul>
		</section>
		<section id="animals" class="content">
			<?php if(!empty($animals)): ?>
				<ul>
					<?php foreach($animals as $animal): ?>
						<li>
							<img class="thumbnail" src="<?= IMAGE_ANIMALS_PATH . $animal->get_Name() ?>.jpg">
							<span>
								<?= $animal->get_Name() ?>
							</span>
							<h6 class="status-<?= $animal->get_Status() ?>">
								<?= $animal->get_StatusText() ?>
							</h6>
							<button onclick="location.href='<?= $router->generate('editanimal', ['slug' => $animal->construct_Slug($animal->get_Id())])?>'">Editer</button>
						</li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		</section>
		<section id="admins" class="content">
			admins
		</section>
	<?php endif ?>
</main>
<script type="text/javascript">
	function changeSection(id){
		var btn= document.getElementsByClassName("btn-nav");
		var section= document.getElementsByClassName("content");
		for (var i = 0; i < btn.length; i++) {
			btn[i].classList.remove('current');
			section[i].classList.remove('current');
		}
		document.getElementById("btn-"+ id).classList.add('current');
		document.getElementById(id).classList.add('current');
	}
</script>