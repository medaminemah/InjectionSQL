<?php
	class admin
	{
		private $login;
		private $pass;
		
		function __construct($login,$pass)
		{
			$this->login=$login;
			$this->pass=$pass;
		}
		
		function add()
		{
			include(__dir__ .'\cnx_bdd.php');
			$res=$bdd->exec("INSERT INTO `admin` (`id`,`login`, `pass`) VALUES (NULL, '$this->login', MD5('$this->pass')");
			$bdd=null;
		}
		
		function verifier_login_pass($login,$pass)
		{
			include(__dir__ .'\cnx_bdd.php');
			$res=$bdd->query("SELECT * FROM `admin` WHERE `login` LIKE '$login' AND `pass` LIKE MD5('$pass')");
			$v = null;
			while($var = $res->fetch(PDO::FETCH_ASSOC))
			{
				$v=$var;
			}
			$bdd=null;
			return $v;
		}
		
		function getNomById($id)
		{
			include(__dir__ .'\cnx_bdd.php');
			$res=$bdd->query("SELECT * FROM `admin` WHERE `id` = '$id'");
			$v = null;
			while($var = $res->fetch(PDO::FETCH_ASSOC))
			{
				$v=$var['login'];
			}
			$bdd=null;
			return $v;
		}
		
	}
	
	
?>