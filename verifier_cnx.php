<?php
session_start();
if(isset($_SESSION['admin']))
	header('location:index.php');

	if(isset($_POST['login']) && isset($_POST['pass']))
	{
		//$login = addslashes($_POST['login']);
		$login = $_POST['login'];
		//$pass  = addslashes($_POST['pass']);
		$pass  = $_POST['pass'];
		
		include('classe/admin.php');
		$ad = new admin(1,1);
		$rs = $ad->verifier_login_pass($login,$pass);
		if($rs == null)
			header('location:login.php?Erreur=2');
		else
		{
			$_SESSION['login']=$login;
			$_SESSION['admin']=$rs;
			header('location:index.php');
		}
	}
	else
	{
		header('location:login.php?Erreur=2');
	}
?>