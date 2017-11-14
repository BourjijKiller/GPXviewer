<?php

namespace PT4\core;

class Controller
{
	public function render($view, $array)
	{
		ob_start();
		extract($array);
		include($_SERVER['DOCUMENT_ROOT'].'/src/views/'.$view.'.php');
		echo ob_get_clean();
		return;
	}

	public function renderMenu($menu)
	{
		ob_start();
		include($_SERVER['DOCUMENT_ROOT'].'/src/views/menu/'.$menu.'.php');
		return ob_get_clean();
	}

	public function renderHead($head)
	{
		ob_start();
		include($_SERVER['DOCUMENT_ROOT'].'/src/views/head/'.$head.'.php');
		return ob_get_clean();
	}

	public function renderFooter($footer)
	{
		ob_start();
		include($_SERVER['DOCUMENT_ROOT'].'/src/views/footer/'.$footer.'.php');
		return ob_get_clean();
	}

	public function renderForm($form)
	{
		ob_start();
		include($_SERVER['DOCUMENT_ROOT'].'/src/views/forms/'.$form.'.php');
		return ob_get_clean();
	}

	public function isConnected()
	{
		return isset($_SESSION['username']) ? $_SESSION['username'] : false;
	}

	public function getFlashBag()
	{
		if(!empty($_SESSION['flashbagMsgSuccess']))
		{
			$flashSuccess = '<div class="col-lg-10 col-lg-push-1 alert alert-success">'.$_SESSION['flashbagMsgSuccess'].'</div>';
			unset($_SESSION['flashbagMsgSuccess']);
		}

		else
		{
			$flashSuccess = null;
		}

		if(!empty($_SESSION['flashbagMsgErrors']))
		{
			$flashError = '<div class="col-lg-10 col-lg-push-1 alert alert-danger">'.$_SESSION['flashbagMsgErrors'].'</div>';
			unset($_SESSION['flashbagMsgErrors']);
		}

		else $flashError = null;

		$res = array(
			'success' => $flashSuccess,
			'error' => $flashError
		);

		return $res;
	}

	public function getSession()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}

		return;
	}
}