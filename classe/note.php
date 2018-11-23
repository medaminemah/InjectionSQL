<?php
	class note
	{
		private $note;
		
		function __construct($note)
		{
			$this->note=$note;
		}
		
		function add()
		{
			include(__dir__ .'\cnx_bdd.php');
			$res=$bdd->exec("");
			$bdd=null;
		}
		
		function getNotes($id)
		{
			include(__dir__ .'\cnx_bdd.php');
			$res=$bdd->query("SELECT * FROM `note` WHERE `id_etudiant` = '$id'");
			$bdd=null;
			return $res;
		}
		
	}
	
	
?>