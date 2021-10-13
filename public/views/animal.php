<?php 
    $id = (intval($params['slug']) + 12) / 16934;
    $animal = getAnimalById($id);
?>
<main class="product">
    <section class="image-list">
        <img id="thumbnail" class="thumbnail" src="<?= IMAGE_ANIMALS_PATH . $animal->get_Name() ?>.jpg">
    </section>
    <section class="image">
        <img id="preview" src="<?= IMAGE_ANIMALS_PATH . $animal->get_Name() ?>.jpg">
    </section>
    <section class="product-desc">
        <div>
            <h2>
                <?= $animal->get_Name()?>
            </h2>
            <h6>
                <?= $animal->get_Sexe()?>
            </h6>
            <h6>
                <?= $animal->get_Birthday()?>
            </h6>
            <h6>
                <?= $animal->get_Breed() ?>
            </h6>
            <h6>
                <?= $animal->get_ArrivedAt() ?>
            </h6>
            <span class="status-<?= $animal->get_Status() ?>">
                <?= $animal->get_StatusText() ?>
            </span>
        </div>
    </section>
    <section>
        <p>
            Description : <br>
            <?= $animal->get_Description()?>
        </p>
    </section>
    <?php if($animal->get_Status() == 0) : ?>
        <section id="adoption-form-section">
            <form action=<?= $router->generate('animal', ['slug' => $animal->construct_Slug($animal->get_Id())])?> method="POST">
                <h2>
                Formulaire d'adoption
            </h2>
            <div>
                <label for="quote-firstname">Prénom :</label>
                <input type="text" name="quote_user_firstname" placeholder="Votre prénom" autocomplete="off" id="quote-firstname" required/>
            </div>
            <div>
                <label for="quote-lastname">Nom :</label>
                <input type="text" name="user_lastname" placeholder="Votre nom de famille" autocomplete="off" id="quote-lastname" required/>
            </div>
            <div>
                <label for="quote-mail">Email :</label>
                <input type="email" name="user_mail" placeholder="Votre adresse mail" autocomplete="off" id="quote-mail" required/>
            </div>
            <div>
                <label for="quote-phone">Numéro de téléphone :</label>
                <input type="tel" name="user_phone" placeholder="Votre numéro de téléphone" autocomplete="off" id="quote-phone" required/>
            </div>
            <div>
                <label for="quote-details">Vous présenter :</label>
                <textarea name="user_details" placeholder="Veuillez détailler votre situation afin que nous apprenions à vous connaître !" autocomplete="off" id="quote-details" required></textarea>
            </div>
            <button type="submit">
                Envoyer
            </button>
            </form>
        </section>
    <?php endif ?>
</main>