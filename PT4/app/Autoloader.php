<?php

namespace PT4\app;

class Autoloader
{
	public static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	public static function autoload($class)
	{
		$parts = preg_split('#\\\#', $class);
		$className = array_pop($parts);
		switch($className) {
			case 'Controller':
				require_once __DIR__.'/../core/'.$className.'.php';
				break;
			case 'Connection':
				require_once __DIR__.'/../core/'.$className.'.php';
				break;
			case 'issetLogin':
				require_once __DIR__.'/../src/models/'.$className.'.php';
				break;
			case 'issetEmail':
				require_once __DIR__.'/../src/models/'.$className.'.php';
				break;
			case 'getPassword':
				require_once __DIR__.'/../src/models/'.$className.'.php';
				break;
			default:
				require_once __DIR__.'/../src/controllers/'.$className.'.php';
				break;
		}
	}
}