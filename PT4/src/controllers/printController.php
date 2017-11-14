<?php

namespace PT4\src\controllers;

use PT4\core\Controller;

class printController extends Controller
{

	public function print()
	{
		if($this->isConnected())
		{
			if(isset($_POST['retour']))
				header('Location:choix');
			
			$this->seePrint();
		}

		else
			header('Location:home');
	}

	public function seePrint()
	{
		$this->getSession();
		$this->render('print', array());
	}
}