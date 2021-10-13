<?php

use App\DataBase;

function addAdmin($login, $password){
    $db = new DataBase;
    $login = strtolower(htmlentities($login));
    $passw = password_hash($password, PASSWORD_DEFAULT, ['cost'=>16]);
	$req = "INSERT INTO `admin` (`login`, `password`) 
            VALUES ('$login', '$passw')";
    $res = $db->insert($req);
	return $res;
}

function deleteAdminById(int $id)
{
    $db = new DataBase;
    $req = "DELETE FROM `admin` WHERE id = " . $id;
    $res = $db->execute($req);
	return $res;
}

function getAllAdmins()
{
    $db = new DataBase;
    $admins = $db->select_class("SELECT * FROM `admin`", "App\Admin");
    return $admins;
}

function getAdminById($id)
{
    $db = new DataBase; 
    $admin = $db->select_one_class("SELECT * FROM `admin` WHERE id = ?", "App\Admin", [$id]);
    return $admin;
}

function getAdminByLogin($login)
{
    $db = new DataBase;
    $admin = $db->select_one_class("SELECT * FROM `admin` WHERE `login` = ?", "App\Admin", [$login]);
    return $admin;
}

function updateAdminPassword($id, $newpassw)
{
    $db = new DataBase;
    $req = "UPDATE `admin` SET `password`='". $newpassw . "'  WHERE id=" . $id;
    $res = $db->execute($req);
	return $res;
}

function updateAdminData($id, $login)
{
    $db = new DataBase;
    $login = strtolower(htmlentities($login));
    $req = "UPDATE `admin` SET `login`='". $login . "' WHERE id=" . $id;
    $res = $db->execute($req);
	return $res;
}