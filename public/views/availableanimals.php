<?php
$animals = getAvailableAnimals();
if($animals === false){
die('Erreur SQL');
}
$supdiv = count($animals) / 3;
$i = 0;
?>

<main>
  	<?php require "layout" . DIRECTORY_SEPARATOR . "messages.php"; ?>
	<h1 class="title-market">
		Nos amis disponibles
	</h1>
	<section class="item-list">
		<?php foreach($animals as $animal):
			$id = $animal->get_Id();
		?>	
			<div class="under-item">
				<div class='item'>
					<h2> <?= $animal->get_Name()?> </h2>
					<img alt="<?= $animal->get_Name() ?>" src=<?=  IMAGE_ANIMALS_PATH . $animal->get_Name() . ".jpg" ?>>
					<span class="status-<?= $animal->get_Status() ?>"><?= $animal->get_StatusText() ?></span>
					<button onclick="location.href='<?= $router->generate('animal', ['slug' => $animal->construct_Slug($animal->get_Id())])?>'">En savoir plus sur cet ami</button>
				</div>
			</div>
		<?php endforeach ?>
		<?php while( $i < $supdiv ): ?>
			<div class="void"></div>
			<?php $i = $i +1; ?>
		<?php endwhile ?>
	</section>
</main>
