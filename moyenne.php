<?php
session_start();
if(empty($_SESSION['admin']))
	header('location:login.php');
else
{
	$info_admin = $_SESSION['admin'];
	echo "Bonjour ".$_SESSION['login'];
	
	include('classe/admin.php');
	$admin = new admin(1,1);
	?>
	<br />
	<a href="deconnexion.php">Déconnexion</a>
	<a href="index.php">Retour vers page d'accueil</a>
	<br />
	<?php
		if(empty($_GET['id']))
			echo "Erreur";
		else
		{
	?>
	<center>
	<table border="1" width="80%">
		<tr>
			<td colspan="5">
				<center>RELEVE DE NOTES <b><?php echo $admin->getNomById($_GET['id']); ?></b></center>
			</td>
		</tr>
		<tr>
			<td>
				N°
			</td>
			<td>
				Matière
			</td>
			<td>
				Coefficient
			</td>
			<td>
				Note
			</td>
			<td>
				G
			</td>
		</tr>
		<?php
			include('classe/note.php');
			$ad = new note($_GET['id']);
			$rs = $ad->getNotes($_GET['id']);
			$compteur = 1;
			$coef=0.0;
			$total=0.0;
			while($var = $rs->fetch(PDO::FETCH_ASSOC))
			{
				
				echo "<tr><td>".$compteur."</td>";
				echo "<td>".$var['matiere']."</td>";
				echo "<td>".$var['coeff']."</td>";
				echo "<td>".$var['note']."</td>";
				echo "<td>".$var['note']*$var['coeff']."</td></tr>";
				$coef+=$var['coeff'];
				$total+=$var['note']*$var['coeff'];
				$compteur++;
			}
		?>
		<tr>
			<td>
				Total
			</td>
			<td>
				***
			</td>
			<td>
				<?php
					echo $coef;
				?>
			</td>
			<td>
				***
			</td>
			<td>
				<?php
					echo $total;
				?>
			</td>
		</tr>
		<tr>
			<td colspan=3>
				Moyenne
			</td>
			<td colspan=3>
				<?php
				if($coef==0)
					echo "00.00/20";
				else
					echo $total/$coef."/20";
				?>
			</td>
		</tr>
	</table>
	</center>
	<?php
		}
}
?>
