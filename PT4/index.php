<?php

namespace PT4;

use PT4\app\Autoloader;
use PT4\src\controllers\carteController;
use PT4\src\controllers\choixController;
use PT4\src\controllers\homeController;
use PT4\src\controllers\connectController;
use PT4\src\controllers\registerController;
use PT4\src\controllers\uploadController;
use PT4\src\controllers\printController;

include __DIR__.'/app/Autoloader.php';
Autoloader::register();

require_once 'app/config/dbconnect.php';

if(session_status() === PHP_SESSION_NONE)
{
	session_start();
}

if(!isset($_GET['section']) or $_GET['section'] == 'home')
{
	$controller = new homeController();
	$controller->home();
}

else
{
	switch ($_GET['section'])
	{
		case 'carte':
			$controller = new carteController();
			$controller->carte();
			break;

		case 'choix':
			$controller = new choixController();
			$controller->choix();
			break;

		case 'connect':
			$controller = new connectController();
			$controller->connect();
			break;

		case 'register':
			$controller = new registerController();
			$controller->register();
			break;

		case 'logout':
			$controller = new connectController();
			$controller->disconnect();
			break;

		case 'upload':
			$controller = new uploadController();
			$controller->upload();
			break;

		case 'print':
			$controller = new printController();
			$controller->print();
			break;

		default:
			header('Location:index.php');
	}
}