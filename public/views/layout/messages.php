<?php if(!empty($validationMessage) && is_string($validationMessage)): ?>
    <div class="validation-message"> 
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