<?php 

namespace PT4\src\models;

use PT4\core\Connection;

class issetEmail
{
	public static function issetEmail($mail)
	{
		$pdo = Connection::getConnection();
		$stmt = $pdo->prepare('SELECT id,identifiant FROM users WHERE email=?');
		$stmt->execute(array($mail));
		return empty($stmt->fetch())?false:true;
	}
}