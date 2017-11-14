<?php

namespace PT4\src\controllers;

use PT4\core\Controller;

class carteController extends Controller
{
	public function carte()
	{
		$this->getSession();
		
		if ($this->isConnected())
		{
			if(isset($_POST['retour']))
				header('Location:choix');
			
			$this->render(
				'carte',
				array(
					"head" => $this->renderHead('carte'),
					"footer" => $this->renderFooter('carte'),
					"points" => $_SESSION['points']
				)
			);
		}

		else
		{
			header('Location:home');
		}
	}
}