<?php
if(session_status() === PHP_SESSION_NONE){
	session_start();
}
unset($_SESSION["current-user-id"]);
session_write_close();
sleep(1);
header('Location: /tous-nos-amis');
