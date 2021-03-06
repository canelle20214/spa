<?php

function redirect_account (): void {
  if(is_connected_user()){
    session_write_close();
    header('Location: http://localhost:8000/mon-compte');
    exit;
  }
}

function redirect_unconnected_user (): void {
  if(!is_connected_user()){
    session_write_close();
    header('Location: http://localhost:8000/connexion');
    exit;
  }
}

function redirect_connected_user (): void {
  if(is_connected_user()){
    session_write_close();
    header('Location: http://localhost:8000/');
    exit;
  }
}

function redirect_connected_admin (): void {
  if(is_connected_admin()){
    session_write_close();
    header('Location: http://localhost:8000/');
    exit;
  }
}