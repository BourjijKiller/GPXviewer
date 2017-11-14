<?php

namespace PT4\src\controllers;

use PT4\core\Controller;

class choixController extends Controller
{
	public function choixParcours()
	{
		$this->getSession();

		if(isset($_POST['Valider']))
		{
			if(isset($_POST['choix']))
			{
				if($_POST['choix'] == "choix_fonction_snap_to_road")
				{
					header('Location:upload');
				}

				else if($_POST['choix'] == "choix_fonction_snap_to_road_2")
				{
					header('Location:print');
				}

			}

			else
			{
				if(isset($_POST['Valider']))
					$_SESSION['flashbagMsgErrors']='<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Merci de choisir un type de parcours </div>';
			}
		}

		$flashBag = $this->getFlashBag();

		$this->render(
			'choix',
			array(
				"head" => $this->renderHead('default'),
				"menu" => $this->renderMenu('choixMenu'),
				"footer" => $this->renderFooter('footer'),
				"success" => $flashBag['success'],
				"error" => $flashBag['error']
			)
		);
	}

	public function choix()
	{
		if ($this->isConnected())
		{
			$this->choixParcours();
		}

		else
		{
			header('Location:home');
		}
	}
}