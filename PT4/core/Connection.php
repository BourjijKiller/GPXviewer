<?php

namespace PT4\core;

class Connection
{
	private $pdo = null;
	private static $_connection = null;

	private function __construct()
	{
		try
		{
			$this->pdo = new \PDO("mysql:host=".DATABASE_HOST.";dbname=".DATABASE_NAME.";charset=utf8",DATABASE_LOGIN,DATABASE_PASSWORD);
			$this
				->pdo
				->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC)
			;
			self::$_connection = true;
		}

		catch (\PDOException $exception)
		{
			echo "Database connection error: ".$exception;
		}
	}

	public static function getConnection()
	{
		if (null === self::$_connection)
		{
			self::$_connection = new self;
		}

		return self::$_connection;
	}

	public function prepare($query)
	{
		return $this->pdo->prepare($query);
	}
}