<?php

use App\DataBase;

function addAnimal(string $name, string $sexe, string $birthday, string $specie, string $breed, string $description, int $status){
    $db = new DataBase;
    $name = strtolower(htmlentities($name));
    $birthday = htmlentities($birthday);
    $specie = strtolower(htmlentities($specie));
    $breed = strtolower(htmlentities($breed));
    $desc = htmlentities($description);
	$req = "INSERT INTO `animal` (`name`, `sexe`, `birthday`, `specie`, `breed`, `description`, `status`) 
            VALUES ('$name', '$sexe', '$birthday', '$specie', '$breed', '$desc', " . $status . ")";
    $res = $db->insert($req);
	return $res;
}

function deleteAnimalById(int $id)
{
    $db = new DataBase;
    $req = "DELETE FROM `animal` WHERE id = " . $id;
    $res = $db->execute($req);
	return $res;
}

function getAllAnimals()
{
    $db = new DataBase;
    $animals = $db->select_class("SELECT * FROM `animal`", "App\Animal");
    return $animals;
}

function getAvailableAnimals()
{
    $db = new DataBase;
    $animals = $db->select_class("SELECT * FROM `animal` WHERE `status`=0", "App\Animal");
    return $animals;
}

function getAnimalById(int $id)
{
    $db = new DataBase; 
    $animal = $db->select_one_class("SELECT * FROM `animal` WHERE id = ?", "App\Animal", [$id]);
    return $animal;
}

function updateAnimal(int $id, string $name, string $sexe, string $birthday, string $specie, string $breed, string $description, int $status, string $arrived_at)
{
    $db = new DataBase;
    $name = strtolower(htmlentities($name));
    $birthday = htmlentities($birthday);
    $specie = strtolower(htmlentities($specie));
    $breed = strtolower(htmlentities($breed));
    $desc = htmlentities($description);
    $req = "UPDATE `animal` SET `name`='". $name . "', birthday='". $birthday . "', specie='". $specie . "', breed='". $breed . "', sexe='". $sexe . "', `description`='". $desc . "', `status`='". $status . "', arrived_at='". $arrived_at . "'  WHERE id=" . $id;
    $res = $db->execute($req);
	return $res;
}