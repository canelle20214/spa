<?php

function editPasswordFunc(): void 
{
  redirect_unconnected_user();
  if(isset($_POST['submit'])){
    $error = validatePasswordEdition();
    if(!empty($_POST) && is_null($error) || !empty($_POST) && !is_string($error)){
      $id = updateCurrentUserPassword($_SESSION['current-user-id']);
      if(isset($id)){
        $GLOBALS['validationMessage'] = 'Votre mot de passe a été mises à jour.';
      }else{
        $error[] = "L'ancien mot de passe ne correspond pas.";
      }
    }
  }
  if(isset($GLOBALS['validationMessage'])){
    redirect_account();
  }
}

function editProfileFunc(): void 
{
  redirect_unconnected_user();
  if(isset($_POST['submit'])){
    $error = validateProfileEdition();
    if(!empty($_POST) && is_null($error) || !empty($_POST) && !is_string($error)){
      $id = updateUserData($_SESSION['current-user-id'], $_POST['edit-mail'], $_POST['edit-firstname'], $_POST['edit-lastname'], $_POST['edit-phone']);
      if(isset($id)){
        $GLOBALS['validationMessage'] = 'Votre données ont été mises à jour.';
      }
    }
  }
  if(isset($GLOBALS['validationMessage'])){
    redirect_account();
  }
}

function loginFunc(): void{
  $errorMessage = array();
  $mail = $_POST['current-mail'] ?? '';
  $password = $_POST['current-password'] ?? '';
  $hashpassword = password_hash($password, PASSWORD_DEFAULT, ['cost'=>16]);
  if(!empty($_POST['current-mail']) && !empty($_POST['current-password'])) {
    if(isMailExists($mail)){
      if(isMailMatchsPassword($mail, $password)){
        $user = getUserByMail($mail);
        $_SESSION["current-user-id"] = $user->get_Id();
        $_SESSION["current-basket"] = Array();
        $_SESSION["current-address-id"] = -1;
        $_SESSION["current-payment-id"] = -1;
        $GLOBALS['validationMessage'] = 'Bienvenue ' . $user->get_Firstname();
      }else{
        $errorMessage[] = "Le mot de passe ne correspond pas à votre adresse mail.";
      }
    }
    else{
      $errorMessage[] = "Cette adresse mail n'est pas attribuée.";
    }
  }
  if(isset($_SESSION["current-user-id"])){
    redirect_connected_user();
  }
}

function registerFunc(): void {
  $error = validateMember();
  if(!empty($_POST) && is_null($error) || !empty($_POST) && !is_string($error)){
    $id = addUser($_POST['user-mail'], $_POST['user-password'], $_POST['user-firstname'], $_POST['user-lastname'], $_POST['user-phone']);
    if(isset($id)){
      if(session_status() === PHP_SESSION_NONE){
        session_start();
      }
      $_SESSION["current-user-id"] = $id;
      if(!isset($_SESSION["current-basket"])){
        $_SESSION["current-basket"] = Array();
      }
      $GLOBALS['validationMessage'] = 'Votre compte a été créé avec succés.';
    }
  }
  if(isset($_SESSION["current-user-id"])){
    redirect_connected_user();
  }
}