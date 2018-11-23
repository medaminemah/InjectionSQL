<?php
	//Connexion à Base des donnée
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=bd_test;charset=utf8', 'root', '');
		
	}catch(Exception $exp)
	{
		echo "ERREUR :".$exp->getmessage();
	}
?>