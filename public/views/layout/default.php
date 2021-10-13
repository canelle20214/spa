<?php
$logo = IMAGE_PATH . DIRECTORY_SEPARATOR . 'logo' . DIRECTORY_SEPARATOR . 'logo_large.png';
$basket = IMAGE_PATH . DIRECTORY_SEPARATOR . 'bag-white.png';
$account = IMAGE_PATH . DIRECTORY_SEPARATOR . 'account.png';
$phone = IMAGE_PATH . DIRECTORY_SEPARATOR . 'phone-unfilled-white.png';
$instagram = IMAGE_PATH . DIRECTORY_SEPARATOR . 'icon-insta-unfilled-white.png';
$css_account = CSS_PATH . DIRECTORY_SEPARATOR . 'account.css';
$css_basket = CSS_PATH . DIRECTORY_SEPARATOR . 'basket.css';
$css_default = CSS_PATH . DIRECTORY_SEPARATOR . 'default.css';
$css_template = CSS_PATH . DIRECTORY_SEPARATOR . 'template.css';
$css_market = CSS_PATH . DIRECTORY_SEPARATOR . 'market.css';
$css_product = CSS_PATH . DIRECTORY_SEPARATOR . 'product.css';
$fonts = CSS_PATH . DIRECTORY_SEPARATOR . 'font.css';
$script = SCRIPT_PATH . DIRECTORY_SEPARATOR . 'app.js';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset='UTF-8'>
	<title>Adopt Happiness</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src=<?=$script?> ></script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="/favicon.png">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<link rel="stylesheet" type="text/css" href=<?=$css_account?> />
	<link rel="stylesheet" type="text/css" href=<?=$css_basket?> />
	<link rel="stylesheet" type="text/css" href=<?=$css_default?> />
	<link rel="stylesheet" type="text/css" href=<?=$css_template?> />
	<link rel="stylesheet" type="text/css" href=<?=$css_market?> />
	<link rel="stylesheet" type="text/css" href=<?=$css_product?> />
	<link rel="stylesheet" type="text/css" href=<?=$fonts?> />
</head>
<body>
	<div id="main-div">
		<img id="logo" src=<?=$logo?>>
		<nav>
			<ul>
				<li>
					<a href=<?= $router->generate('animals')?>>
						Tous nos amis
					</a>
				</li>
				<li>
					<a href=<?= $router->generate('availableanimals')?>>
						Nos amis disponibles
					</a>
				</li>
				<?php if(!is_connected_user() && !is_connected_admin()): ?>
					<li>
						<span>
							<a href=<?= $router->generate('login')?>>
								Se connecter
							</a>
						</span>
					</li>
				<?php endif ?>
			</ul>
			<?php if(is_connected_user() || is_connected_admin()): ?>
				<div>
					<img id="account" src=<?= $account?>>
					<ul id="hidden-menu">
						<li>
							<span>
								<a href=<?= $router->generate('account')?>>
									Mon compte
								</a>
							</span>
						</li>
						<li>
							<span>
								<a href=<?= $router->generate('logout')?>>
									Se déconnecter
								</a>
							</span>
						</li>
					</ul>
				</div>
			<?php endif ?>
		</nav>
	</div>
	<?php if(!empty($validationMessage) && is_string($validationMessage)): ?>
		<div class="info-message"> 
			<span> 
				<?= $validationMessage ?>
			</span>
		</div>
	<?php endif ?>
	<?php if (!empty($errorMessage) && is_array($errorMessage)): ?>
		<?php foreach($errorMessage as $message): ?>
			<div class="error-message">
				<span> 
					<?=$message?>
				</span>
			</div>
		<?php endforeach ?>
	<?php endif ?>
	<?= $content ?>
	<footer>
		<div>
			<img src=<?=$phone?>>
		 	<h6>
				01 23 45 67 89
		 	</h6>
		</div>
		<div>
			<img src=<?=$instagram?>>
		 	<a href="https://www.instagram.com/adopthappiness/?hl=fr">
				@adopthappiness
		 	</a>
		</div>
	</footer>
</body>
</html>