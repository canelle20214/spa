<?php
require '../index.php';

$response = array();

// GET
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id'])){
        // GET BY ID
        $user = getUserById($_GET['id']);
        if(!$user){
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
            
        }else{
            $response['error'] = false;
            $response['message'] = "Request successfull";
            $response['data'] = $user;
        }
    }else{
        if(isset($_GET['mail'])){
            // GET BY MAIL
            $user = getUserByMail($_GET['mail']);
            if(!$user){
                $response['error'] = true;
                $response['message'] = "An error occured, please try again.";
                $response['data'] = null;
                
            }else{
                $response['error'] = false;
                $response['message'] = "Request successfull";
                $response['data'] = $user;
            }
        }else{
            // GET ALL
            $users = getAllUsers();
            if(!$users){
                $response['error'] = true;
                $response['message'] = "An error occured, please try again.";
                $response['data'] = null;
            }else{
                $response['error'] = false;
                $response['message'] = "Request successfull";
                $response['data'] = $users;
            }
        }
    }
}


// POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['mail']) and isset($_POST['password']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['phone'])){
        $id = addUser($_POST['mail'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['phone']);
        if(isset($id)){
            $response['error'] = false;
            $response['message'] = "User added successfully";
            $response['data'] = $id;
        }else{
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Missing parameters";
        $response['data'] = null;
    }
}

// PATCH

// PUT
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    if(isset($_GET['id']) and isset($_POST['mail']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['phone'])){
        $user = updateUserData($_GET['id'], $_POST['mail'], $_POST['firstname'], $_POST['lastname'], $_POST['phone']);
        if(!$user){
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
        }else{
            $response['error'] = false;
            $response['message'] = "User updated successfully";
            $response['data'] = $id;
        }
    }else{
        if(isset($_GET['id']) and isset($_POST['password'])){
            $user = updateUserPassword($_GET['id'], $_POST['password']);
            if(!$user){
                $response['error'] = true;
                $response['message'] = "An error occured, please try again.";
                $response['data'] = null;
            }else{
                $response['error'] = false;
                $response['message'] = "User updated successfully";
                $response['data'] = $id;
            }
        }else{
            $response['error'] = true;
            $response['message'] = "Missing parameters";
            $response['data'] = null;
        }
    }
}

// DELETE
if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    if(isset($_GET['id'])){
        $user = deleteUserById($_GET['id']);
        if(!$user){
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
            
        }else{
            $response['error'] = false;
            $response['message'] = "User deleted successfully";
            $response['data'] = $user;
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Missing parameters";
        $response['data'] = null;
    }
}

echo json_encode($response);