<?php
session_start();

require '../functions/functions.php';
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// define('DEBUG_TIME', microtime(true));
define('IMAGE_PATH', '/static/images');
define('IMAGE_ANIMALS_PATH', IMAGE_PATH . '/animals/');
define('VIEW_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('CSS_PATH', '/css');
define('SCRIPT_PATH', '/script');
$uri = 'views';
$path = __DIR__ . DIRECTORY_SEPARATOR . 'views';

$router = new App\Router($path);


$router->getPost('/connexion', 'login', 'login')
		->getPost('/inscription', 'register', 'register')
		->getPost('/notre-ami/[i:slug]/', 'animal', 'animal')
		->get('/tous-nos-amis', 'animals', 'animals')
		->get('/nos-amis-disponibles', 'availableanimals', 'availableanimals')
		->get('/mon-compte', 'account', 'account')
		->getPost('/edition-profil', 'editprofile', 'editprofile')
		->getPost('/edition-mot-de-passe', 'editpassword', 'editpassword')
		->get('/logout', 'logout', 'logout')
		->run();

$match=$router->match();
