<?php

include "includes/logat.php";

$pagina="admin_parroquies.php";

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
	$sql="SELECT id_pais, nom_pais FROM paisos ORDER BY nom_pais";
    $result = $conn->query($sql);
?>

        <?= '<'.'?xml version="1.0" encoding="UTF-8"'.'>'?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
                <head>
                        <title>Llistat de paisos</title>
                <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
        </head>
        <body>

<?php
    include "includes/menu.php";
	echo "<h3>Llistat de paisos</h3>
		<table width=\"80%\">
			<tr>
				<td><b>Id_pais</b></td>
				<td><b>Nom_pais</b></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>";
	while($row = $result->fetch_assoc()){
		$id=$row["id_pais"];
		$nom=$row["nom_pais"];
		echo"<tr>
			<td>$id</td>
			<td>$nom</td>
			<td><a href=\"$pagina?accio=2&id_pais=$id\">editar</a></td>
			<td><a href=\"$pagina?accio=4&id_pais=$id\">esborrar</a></td>
		</tr>";
	}
	tancarConnexioBD();
	echo "<tr><td colspan=\"5\"><a href=\"$pagina?accio=1&id_pais=0\">nou</a></td></tr>
	</table>
	</body>
	</html>";

// Nou o editar
} elseif ($accio=="1" || $accio=="2"){
        if ($accio=="1") {
            $id="";
            $nom="";
        }
		if ($accio=="2") {
			$id=$_REQUEST["id_pais"];
			include "../includes/connexio.php";
            obrirConnexioBD();
			$sql="SELECT id_pais, nom_pais FROM paisos WHERE id_pais='$id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
			$nom=$row["nom_pais"];
			tancarConnexioBD();
		}
?>

        <?= '<'.'?xml version="1.0" encoding="UTF-8"'.'>'?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
                <head>
                        <title>Creació/edició de paisos</title>
                <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
        </head>
        <body>

<?php	include "includes/menu.php";
		echo "<h3>Creació/edició de parròquies</h3>
			<form name=\"form1\" method=\"post\" action=\"$pagina?accio=3&id_paisos=$id\">";
        if ($accio=="2") echo "<input type=\"hidden\" name=\"id_old\" value=\"$id\">";
        echo "  <table>
					<tr>
						<td>Id:</td>
						<td><input type=\"text\" name=\"id_pais\" value=\"$id\" maxlength=\"5\"></td>
					</tr>
					<tr>
						<td>Nom:</td>
						<td><input type=\"text\" name=\"nom_pais\" value=\"$nom\" maxlength=\"100\"></td>
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
	if (isset($_REQUEST["id_old"])) $id_old=$_REQUEST["id_old"]; else $id_old="";
	$id=$_REQUEST["id_pais"];
	$nom=$_REQUEST["nom_pais"];
	include "../includes/connexio.php";
    obrirConnexioBD();
	if ($id_old=="") {
		$sql="INSERT INTO paisos (id_pais, nom_pais) VALUES ('$id', '$nom')";
        $conn->query($sql);
	} else {
		$sql="UPDATE paisos SET id_pais='$id', nom_pais='$nom' WHERE id_pais='$id_old'";
        $conn->query($sql);
	}
	tancarConnexioBD();
	header("Location:$pagina");

// Esborrar
} elseif ($accio=="4") {
	$id=$_REQUEST["id_pais"];
	include "../includes/connexio.php";
    obrirConnexioBD();
	$sql="DELETE FROM paisos WHERE id_pais='$id'";
    $conn->query($sql);
	tancarConnexioBD();
	header("Location:$pagina");
}
?>
