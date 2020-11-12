<?php

include "includes/logat.php";

$pagina="admin_usuaris.php";

// Accions de manteniment d'usuaris
//	0 -> Llistar
//	1 -> Nou
//	2 -> Editar
//	3 -> Recollir usuari des de 1 i 2
//	4 -> Esborrar

if (isset($_REQUEST["accio"])) $accio=$_REQUEST["accio"]; else $accio="0";

// Llistar
if ($accio=="0") {
	include "../includes/connexio.php";
    obrirConnexioBD();
	$sql="SELECT id_usuari, nom_usuari, contrasenya FROM usuaris ORDER BY nom_usuari";
    $result = $conn->query($sql);
?>

        <?= '<'.'?xml version="1.0" encoding="UTF-8"'.'>'?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
                <head>
                        <title>Llistat d'usuaris</title>
                <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
        </head>
        <body>

<?php
    include "includes/menu.php";
	echo "<h3>Llistat d'usuaris</h3>
		<table width=\"80%\">
			<tr>
				<td><b>Nom_usuari</b></td>
				<td><b>contrasenya</b></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>";
	while($row = $result->fetch_assoc()){
		$id=$row["id_usuari"];
		$nom=$row["nom_usuari"];
		$password=$row["contrasenya"];
		echo"<tr>
			<td>$nom</td>
			<td>$password</td>
			<td><a href=\"$pagina?accio=2&id_usuari=$id\">editar</a></td>
			<td><a href=\"$pagina?accio=4&id_usuari=$id\">esborrar</a></td>
		</tr>";
	}
	tancarConnexioBD();
	echo "<tr><td colspan=\"5\"><a href=\"$pagina?accio=1&id_usuari=0\">nou</a></td></tr>
	</table>
	</body>
	</html>";

// Nou o editar
} elseif ($accio=="1" || $accio=="2"){
        if ($accio=="1") {
            $id="";
            $nom="";
			$password="";
        }
		if ($accio=="2") {
			$id=$_REQUEST["id_usuari"];
			include "../includes/connexio.php";
            obrirConnexioBD();
			$sql="SELECT nom_usuari, contrasenya FROM usuaris WHERE id_usuari=$id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
			$nom=$row["nom_usuari"];
			$password=$row["contrasenya"];
			tancarConnexioBD();
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

<?php	include "includes/menu.php";
		echo "<h3>Creació/edició d'usuaris</h3>
			<form name=\"form1\" method=\"post\" action=\"$pagina?accio=3&id_usuari=$id\">
				<table>
					<tr>
						<td>nom:</td>
						<td><input type=\"varchar\" name=\"nom_usuari\" value=\"$nom\" maxlength=\"50\"></td>
					</tr>					
					<tr>
						<td>contrasenya:</td>
						<td><input type=\"varchar\" name=\"contrasenya\" value=\"$password\" maxlength=\"50\"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type=\"submit\" name=\"submit\" value=\"enviar\"></td>
					</tr>
				</table>
			</form>
		</body>
	</html>";

// Recollir dades
} elseif ($accio=="3") {
	if (isset($_REQUEST["nom_usuari"])) $id=$_REQUEST["id_usuari"]; else $id=0;
	$nom=$_REQUEST["nom_usuari"];
	$password=$_REQUEST["contrasenya"];
	include "../includes/connexio.php";
    obrirConnexioBD();
	if ($id==0) {
		$sql="INSERT INTO usuaris (nom_usuari, contrasenya) VALUES ('$nom','$password')";
        $conn->query($sql);
	} else {
		$sql="UPDATE usuaris SET nom_usuari='$nom', contrasenya='$password' WHERE id_usuari=$id";
        $conn->query($sql);
	}
	tancarConnexioBD();
	header("Location:$pagina");

// Esborrar
} elseif ($accio=="4") {
	$id=$_REQUEST["id_usuari"];
	include "../includes/connexio.php";
    obrirConnexioBD();
	$sql="DELETE FROM usuaris WHERE id_usuari=$id";
    $conn->query($sql);
	tancarConnexioBD();
	header("Location:$pagina");
}
?>
