<?php

function isMailExists($mail): bool
{
    if(getUserByMail($mail) === false){
        return false;
    }else{
        return true;
    }
}

function isMailMatchsPassword(string $mail, string $password): bool 
{
    $user = getUserByMail($mail);
    return password_verify($password, $user->get_Password());
}

function validateMail(string $mail){
    if (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errorMessage[] = "L'adresse mail est invalide.";
        $valid = false;
    }
    if(isMailExists($mail)){
        $error_message[] = "L'adresse mail n'est pas disponible.";
        $valid = false;
    }
}

function validateMember()
{
    $valid = true;
    $errorMessage = array();
    if(empty($_POST)){
        $valid = false;
    }
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $valid = false;
        }
    }

    if($valid == true) {
        validatePassword($_POST['user-password'], $_POST['user-password-confirm']);
        
        if (! isset($error_message)) {
            validateMail($_POST["user-mail"]); 
        }
        
        if (! isset($error_message)) {
            validatePhone($_POST['user-phone']);
        }
        
        if (! isset($error_message)) {
            if (! isset($_POST["terms"])) {
                $errorMessage[] = "Veuillez acceptez les conditions générales d'utilisation.";
                $valid = false;
            }
        }
    }
    else {
        $errorMessage[] = "Tous les champs sont requis.";
    }
    
    if ($valid == false) {
        return $errorMessage;
    }
    return;
}

function validatePhone($phone){
    if (strlen(intval($phone)) ==! 10) {
        $errorMessage[] = "Le numéro de téléphone est invalide.";
        $valid = false;
    }
}

function validatePassword(string $password, string $confirm_password){
    if ($password != $confirm_password) {
        $errorMessage[] = 'Les mots de passe ne sont pas identiques.';
        $valid = false;
    }
    if (strlen($password) < 8) {
        $errorMessage[] = 'Le mot de passe doit contenir au moins 8 caractères.';
        $valid = false;
    }
}

function validatePasswordEdition()
{
    $valid = true;
    $errorMessage = array();
    if(empty($_POST)){
        $valid = false;
    }
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $valid = false;
        }
    }
    if($valid == true) {  
        validatePassword($_POST['edit-password'], $_POST['edit-password-confirm']);
    }
    else {
        $errorMessage[] = "Tous les champs sont requis.";
    }
    if ($valid == false) {
        return $errorMessage;
    }
    return;
}

function validateProfileEdition()
{
    $valid = true;
    $errorMessage = array();
    if(empty($_POST)){
        $valid = false;
    }
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $valid = false;
        }
    }
    if($valid == true) {        
        if (! isset($error_message)) {
            validateMail($_POST["edit-mail"]);
        }
        if (! isset($error_message)) {
            validatePhone($_POST["edit-phone"]);
        }
    }
    else {
        $errorMessage[] = "Tous les champs sont requis.";
    }
    if ($valid == false) {
        return $errorMessage;
    }
    return;
}