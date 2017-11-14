<?php 

namespace PT4\src\models;

use PT4\core\Connection;

class issetLogin
{
	public static function issetLogin($login)
	{
		$pdo = Connection::getConnection();
		$stmt = $pdo->prepare('SELECT id,identifiant FROM users WHERE identifiant=?');
		$stmt->execute(array($login));
		return empty($stmt->fetch())?false:true;
	}
}