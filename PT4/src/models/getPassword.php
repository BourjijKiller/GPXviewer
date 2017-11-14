<?php

namespace PT4\src\models;

use PT4\core\Connection;

class getPassword
{
	public static function getPassword($login)
	{
		$pdo = Connection::getConnection();
		$stmt = $pdo->prepare('SELECT password FROM users WHERE identifiant=?');
		$stmt->execute(array($login));
		$res=$stmt->fetch();
		return $res['password'];
	}
}	