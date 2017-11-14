<?php

namespace PT4\src\controllers;

use PT4\core\Controller;

class homeController extends Controller
{
	public function home()
	{
		$this->getSession();

		$head = $this->renderHead('default');
		$homeMenu = $this->renderMenu('homeMenu');
		$footer = $this->renderFooter('footer');
		if($this->isConnected())
		{
			$menuConnected = '<a href="choix"> <b> Parcours </b> </a>';
		}

		else
		{
			$menuConnected = '<a href="connect"> <b> Parcours </b> </a>';
		}

		$this->render(
			'home',
			array(
				"head" => $head,
				"homeMenu" => $homeMenu,
				"footer" => $footer,
				"menuConnected" => $menuConnected
			)
		);
	}
}