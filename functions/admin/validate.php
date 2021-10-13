<?php

function isLoginExists($login): bool
{
    if(getAdminByLogin($login) === false){
        return false;
    }else{
        return true;
    }
}

function isLoginMatchsPassword(string $login, string $password): bool 
{
    $admin = getAdminByLogin($login);
    return password_verify($password, $admin->get_Password());
}

function validateAdminParams()
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
            isLoginExists($_POST["user-login"]); 
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