<?php
session_start();
if(empty($_SESSION['admin']))
	header('location:login.php');
else
{
	$info_admin = $_SESSION['admin'];
	echo "Bonjour ".$_SESSION['login'];
	?>
	<br />
	<a href="deconnexion.php">Déconnexion</a>
	<br />
	<a href="moyenne.php?id=<?php echo $info_admin['id']; ?>">Releve de notes</a>
	<?php
}
?>
