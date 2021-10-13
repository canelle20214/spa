<?php

use App\DataBase;

function addUser(string $mail, string $password, string $firstname, string $lastname, string $phone){
    $db = new DataBase;
    $mail = strtolower(htmlentities($mail));
    $passw = password_hash($password, PASSWORD_DEFAULT, ['cost'=>16]);
    $firstname = strtolower(htmlentities($firstname));
    $lastname = strtolower(htmlentities($lastname));
	$req = "INSERT INTO `user` (mail, `password`, phone, firstname, lastname) 
            VALUES ('$mail', '$passw', '" . $phone .
            "', '$firstname', '$lastname')";
    $res = $db->insert($req);
	return $res;
}

function deleteUserById(int $id)
{
    $db = new DataBase;
    $req = "DELETE FROM `user` WHERE id = " . $id;
    $res = $db->execute($req);
	return $res;
}

function getCurrentUser()
{
    $db = new DataBase;
    if(is_connected()){
        $user = $db->select_one_class("SELECT * FROM `user` WHERE id = ?", "App\User", [$_SESSION['current-user-id']]);
        return $user;
    }
 return; 
}

function getAllUsers()
{
    $db = new DataBase;
    $users = $db->select_class("SELECT * FROM `user`", "App\User");
    return $users;
}

function getUserById(int $id)
{
    $db = new DataBase; 
    $user = $db->select_one_class("SELECT * FROM `user` WHERE id = ?", "App\User", [$id]);
    return $user;
}

function getUserByMail(string $mail)
{
    $db = new DataBase;
    $user = $db->select_one_class("SELECT * FROM `user` WHERE mail = ?", "App\User", [$mail]);
    return $user;
}

function updateUserPassword(int $id, string $newpassw)
{
    $db = new DataBase;
    $req = "UPDATE `user` SET `password`='". $newpassw . "'  WHERE id=" . $id;
    $res = $db->execute($req);
	return $res;
}

function updateUserData(int $id, string $mail, string $firstname, string $lastname, int $phone)
{
    $db = new DataBase;
    $mail = strtolower(htmlentities($mail));
    $firstname = strtolower(htmlentities($firstname));
    $lastname = strtolower(htmlentities($lastname));
    $req = "UPDATE `user` SET mail='". $mail . "', lastname='". $lastname . "', firstname='". $firstname . "', phone='". $phone . "'  WHERE id=" . $id;
    $res = $db->execute($req);
	return $res;
}