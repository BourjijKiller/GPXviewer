<?php

namespace PT4\src\controllers;

use PT4\core\Controller;
use PT4\core\Connection;
use PT4\src\models\issetLogin;
use PT4\src\models\getPassword;
use PT4\src\models\issetEmail;

class registerController extends Controller
{
	public function register()
	{
		$this->getSession();
		$this->checkRegister();

		$flashBag = $this->getFlashBag();
		$this->render(
			'register',
			array(
				"head" => $this->renderHead('default'),
				"menu" => $this->renderMenu('registerMenu'),
				"footer" => $this->renderFooter('footer'),
				"success" => $flashBag['success'],
				"error" => $flashBag['error']
			)
		);
	}
	
	public function checkRegister()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$isValid = true;
			if(!empty($_POST['civilite']) && !empty($_POST['identifiant']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse'])  && !empty($_POST['codePostale']) && !empty($_POST['ville']) && !empty($_POST['password']) && !empty($_POST['confirm_password']))
			{
				if(empty($_POST['civilite']))
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Veuillez nous renseigner votre civilité, s\'il vous plaît ! </div>';
					$isValid = false;
				}
				
				if(issetLogin::issetLogin($_POST['identifiant']))
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Nous sommes désolés le nom d\'utilisateur <strong>'.$_POST['identifiant'].'</strong> existe déjà ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[a-zA-Z0-9]+$/',$_POST['identifiant'])==0)
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Attention ! Nous sommes désolés mais ce nom d\'utilisateur est invalide ! </div>';
					$isValid = false;
				}

				if(issetEmail::issetEmail($_POST['email']))
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Désolé cette adresse email est déjà utilisée ! </div>';
					$isValid = false;
				}

				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Attention! L\'adresse email spécifiée est invalide ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[a-zA-Zéèëï]+$/',$_POST['nom'])==0)
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> S\'il vous plaît le nom ne doit contenir que des lettres ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[a-zA-Zéèëï]+$/',$_POST['prenom'])==0) {
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> S\'il vous plaît le prénom ne doit contenir que des lettres ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[a-zA-Z0-9éèëïù ,]+$/',$_POST['adresse'])==0)
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Attention! L\'adresse postale ne doit contenir que des chiffres et des lettres ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[a-zA-Z0-9éèëïù ,]+$/',$_POST['complement'])==0)
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Attention! Le complément d\'adresse postale ne doit contenir que des chiffres et des lettres ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[0-9]+$/',$_POST['codePostale'])==0)
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span>  Le code postal ne doit contenir que des chiffres ! </div>';
					$isValid = false;
				}

				if(preg_match('/^[a-zA-Zéèêëàâîïôöûü -]+$/',$_POST['ville'])==0)
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> S\'il vous plaît la ville ne doit contenir que les caractères : [a-zA-Zéèêëàâîïôöûü- ] ! </div>';
					$isValid = false;
				}

				if($_POST['password'] != $_POST['confirm_password'])
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Les mots de passe ne correspondent pas ! </div>';
					$isValid = false;
				}

				if($isValid)
				{
					try
					{
						$pdo = Connection::getConnection();
						$stmt = $pdo->prepare('
							INSERT INTO users (
								civilite, 
								nom, 
								prenom, 
								email, 
								adresse,
								complement,
								codePostale,
								ville,
								identifiant,
								password
							  ) 
							VALUES (?,?,?,?,?,?,?,?,?,?)
							'
						);

						$params = array(
							$_POST['civilite'],
							$_POST['nom'],
							$_POST['prenom'],
							$_POST['email'],
							$_POST['adresse'],
							$_POST['complement'],
							$_POST['codePostale'],
							$_POST['ville'],
							$_POST['identifiant'],
							password_hash($_POST['password'],PASSWORD_BCRYPT),
						);

						$stmt->execute($params);

						if($_POST['civilite'] == "monsieur")
						{
							$_SESSION['flashbagMsgSuccess']='<div class="custom-success"><span class="glyphicon glyphicon-ok"></span> Utilisateur <strong>'.$_POST['identifiant'].'</strong> enregistré avec succès ! <br>
								Redirection en cours ... </div>';
						}

						else if($_POST['civilite'] == "madame")
						{
							$_SESSION['flashbagMsgSuccess']='<div class="custom-success"><span class="glyphicon glyphicon-ok"></span> Utilisateur <strong>'.$_POST['identifiant'].'</strong> enregistrée avec succès ! <br>
								Redirection en cours ... </div>';
						}

						header("refresh:3;url=connect");
					}

					catch(Exception $e)
					{
						$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Erreur de connexion à la base de donnée : '.$e. '</div>';
						$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Utilisateur <strong>'.$_POST['identifiant'].'</strong> non enregistré(e) ! Erreur d\'enregistrement </div>';
					}
				}

				else
				{
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Échec d\'enregistrement... Veuillez vérifier vos informations </div>';
				}
			}
		}
	}
}