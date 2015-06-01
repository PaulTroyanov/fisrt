<?php
	function getConnect() {
		$config = parse_ini_file('config/db.ini');
		$db = new PDO("mysql:host={$config['host']};dbname={$config['db_name']}", $config['user'], $config['password']);
		return $db;
	}

	function getUserList($db, $status=1) {
		$result = array();
		$query = $db->prepare("SELECT * FROM user WHERE is_active = :status");
		$query->bindParam(':status', $status, PDO::PARAM_INT);
		$query->execute();

		while ($row = $query->fetch(PDO::FETCH_ASSOC)){
			$result[] = $row;
		}
		return $result;
	}

	function createUser($name, $email, $password, $db){
		$query = $db->prepare("INSERT INTO user (name, email, password, date_create) VALUES (:name, :email, :password, now())");
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
	}

	function updateUser($name, $email, $password, $oEmail, $db){
		$query = $db->prepare("UPDATE `user` SET `name` =:name, `email` = :email, `password` = :password WHERE `email` = :oEmail");
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':oEmail', $oEmail, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);

		$query->execute();
	}

	function getUser($email, $db){
		$result = array();
		$query = $db->prepare("SELECT * FROM user WHERE email = :email");
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		
		return $row;
	}