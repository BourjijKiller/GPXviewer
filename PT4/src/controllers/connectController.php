<?php

namespace PT4\src\controllers;

use PT4\core\Controller;
use PT4\src\models\issetLogin;
use PT4\src\models\getPassword;

class connectController extends Controller
{
	public function connect()
	{
		$this->getSession();
		$this->checkConnection();

		$flashBag = $this->getFlashBag();

		$this->render(
			'connect',
			array(
				"head" => $this->renderHead('default'),
				"connectMenu" => $this->renderMenu('connectMenu'),
				"footer" => $this->renderFooter('footer'),
				"flashSuccess" => $flashBag['success'],
				"flashError" => $flashBag['error']
			)
		);
	}
	
	public function checkConnection()
	{
		if(!isset($_SESSION['username']))
		{
			if(!empty($_POST))
			{
				if(empty($_POST['username']) && empty($_POST['password']))
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Les deux champs sont vides ! </div>';
				}

				else if(empty($_POST['username']) || empty($_POST['password']))
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Un des deux champs est vide ! </div>';
				}

				else
				{
					// Tout les champs sont remplis, on teste s'il existe dans la base de données
					if(issetLogin::issetLogin($_POST['username']) && password_verify($_POST['password'], getPassword::getPassword($_POST['username'])))
					{
						setcookie('CookieUsers', $_POST['username'], time()+30*24*60*60); // Cookie valable 30 jours
						$_SESSION['username'] = $_POST['username'];
						$_SESSION['flashbagMsgSuccess']='<div class="custom-success"><span class="glyphicon glyphicon-ok"></span> Utilisateur <strong>'.$_POST['username'].'</strong> connecté avec succès ! <br>
							Redirection vers le choix de votre parcours ... </div>';
						header("refresh:5;url=choix");
					}

					else if(issetLogin::issetLogin($_POST['username']) && !password_verify($_POST['password'], getPassword::getPassword($_POST['username'])))
					{
						$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Mot de passe incorrect pour utilisateur <strong>'.$_POST['username'].'</strong></div>';
					}

					else
					{
						$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Utilisateur <strong>'.$_POST['username'].'</strong> non existant ! Erreur de connexion </div>';
					}
				}
			}
		}

		else
		{
			if(!empty($_POST['logoutYes']))
			{
				$_SESSION['flashbagMsgSuccess']='<div class="custom-success"><span class="glyphicon glyphicon-ok"></span> Déconnexion effectuée ! <br>
					Redirection vers la page d\'accueil ... </div>';
				setcookie('CookieUsers', '', time()-3600); // Détruit le cookie
				unset($_SESSION['username']);
				//session_destroy();
				header("refresh:5;url=home");
			}

			else if(!empty($_POST['logoutNo']))
			{
				$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Déconnexion non effectuée ! <br>
					Redirection vers la page d\'accueil ... </div>';
				header("refresh:5;url=home");
			}
		}
	}

	public function disconnect()
	{
		$this->getSession();
		$this->checkConnection();
		$flashBag = $this->getFlashBag();

		$this->render(
			'logout',
			array(
				"head" => $this->renderHead('default'),
				"logoutMenu" => $this->renderMenu('logoutMenu'),
				"footer" => $this->renderFooter('footer'),
				"flashSuccess" => $flashBag['success'],
				"flashError" => $flashBag['error']
			)
		);
	}
}