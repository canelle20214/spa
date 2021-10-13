<?php

function is_session_active (): bool {
  return session_status() === PHP_SESSION_ACTIVE;
}

function is_connected_user (): bool {
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  return isset($_SESSION["current-user-id"]);
}

function is_connected_admin (): bool {
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  return isset($_SESSION["current-admin-id"]);
}