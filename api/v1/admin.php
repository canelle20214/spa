<?php
require '../index.php';

$response = array();

// GET
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id'])){
        // GET BY ID
        $admin = getAdminById($_GET['id']);
        if(!$admin){
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
            
        }else{
            $response['error'] = false;
            $response['message'] = "Request successfull";
            $response['data'] = $admin;
        }
    }else{
        if(isset($_GET['login'])){
            // GET BY MAIL
            $admin = getAdminByLogin($_GET['login']);
            if(!$admin){
                $response['error'] = true;
                $response['message'] = "An error occured, please try again.";
                $response['data'] = null;
                
            }else{
                $response['error'] = false;
                $response['message'] = "Request successfull";
                $response['data'] = $admin;
            }
        }else{
            // GET ALL
            $admins = getAllAdmins();
            if(!$admins){
                $response['error'] = true;
                $response['message'] = "An error occured, please try again.";
                $response['data'] = null;
            }else{
                $response['error'] = false;
                $response['message'] = "Request successfull";
                $response['data'] = $admins;
            }
        }
    }
}


// POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['login']) and isset($_POST['password'])){
        $id = addAdmin($_POST['login'], $_POST['password']);
        if(isset($id)){
            $response['error'] = false;
            $response['message'] = "Admin added successfully";
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
    if(isset($_GET['id']) and isset($_POST['login'])){
        $admin = updateAdminData($_GET['id'], $_POST['login']);
        if(!$admin){
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
        }else{
            $response['error'] = false;
            $response['message'] = "Admin updated successfully";
            $response['data'] = $id;
        }
    }else{
        if(isset($_GET['id']) and isset($_POST['password'])){
            $admin = updateAdminPassword($_GET['id'], $_POST['password']);
            if(!$admin){
                $response['error'] = true;
                $response['message'] = "An error occured, please try again.";
                $response['data'] = null;
            }else{
                $response['error'] = false;
                $response['message'] = "Admin updated successfully";
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
        $admin = deleteAdminById($_GET['id']);
        if(!$admin){
            $response['error'] = true;
            $response['message'] = "An error occured, please try again.";
            $response['data'] = null;
            
        }else{
            $response['error'] = false;
            $response['message'] = "Admin deleted successfully";
            $response['data'] = $admin;
        }
    }else{
        $response['error'] = true;
        $response['message'] = "Missing parameters";
        $response['data'] = null;
    }
}

echo json_encode($response);