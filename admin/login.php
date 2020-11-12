<?php

function antiHack($pass)
{
	$pass = str_replace("%","",$pass);
	$pass = str_replace("' OR '1=1","",$pass);
	return $pass;
}

if (isset($_REQUEST["nom_usuari"])) $nom_usuari=$_REQUEST["nom_usuari"]; else $nom_usuari="";
if (isset($_REQUEST["contrasenya"])) $password=$_REQUEST["contrasenya"]; else $password="";
if ($nom_usuari!="" && $password!="") {
	include "../includes/connexio.php";
    obrirConnexioBD();
	$sql="SELECT nom_usuari, contrasenya FROM usuaris WHERE nom_usuari='$nom_usuari' AND contrasenya='".antiHack($password)."'";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) {
		session_start();
		$_SESSION["nom_usuari"]=$nom_usuari;
		header("Location:admin.php");
	}
}
?>

<?= '<'.'?xml version="1.0" encoding="UTF-8"'.'>'?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Creació/edició d'usuaris</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
</head>
<body>
	<h3>Benvingut a l'eina d'administració</h3>
		<form name="form1" method="post" action="login.php">
			<table>
				<tr>
					<td>Usuari</td>
					<td><input type="text" name="nom_usuari" value="<?=$nom_usuari?>" maxlength="50" size="25"></td>
				</tr>
				<tr>
					<td>Contrasenya</td>
					<td><input type="password" name="contrasenya" maxlength="15" size="25"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="enviar"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
