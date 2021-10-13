<?php

function updateCurrentUserPassword(int $id){
    $user = getCurrentUser();
    if(validatePassword($user->get_Mail(), $_POST['old-password'])){
        $passw = password_hash($_POST['edit-password'], PASSWORD_DEFAULT, ['cost'=>16]);
        return updateUserPassword($id, $passw);
    }else{
        return;
    }
}