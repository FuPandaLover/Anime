<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<head>	<title>Llistat Anime</title> </head>
<?php
    include "includes/bootstrap.php";
    include "includes/connexio.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php bsHead("Llistat"); ?>
    <head>
		<title>AnimeZone</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="css/verd.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    
        <body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
				
					<nav id="nav">
						<ul>
							<li><a href="index.html">AnimeZone</a></li>
                            <li><a href="llistat_anime.php" class="button primary">Llistar Animes</a></li>                            
							<li><a href="admin\login.php" class="button primary">Administració</a></li>
						</ul>
                    </nav>
</header>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Esborrar anime</h4>
                </div>
            
                <div class="modal-body">
                    <p>Esteu segur que voleu esborrar l'anime?</p>
                </div>   
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Sí</a>
                </div>
            </div>
        </div>
    </div>

      
	<div class="container" style="color:black">
    <br>
		<h3><center>Llistat d'anime</center></h3>
        <br>
<?php
        obrirConnexioBD();
        $sql = "SELECT * FROM anime a INNER JOIN genere g ON a.genere_anime=g.id_genere INNER JOIN tipus t ON a.tipus_anime=t.id_tipus INNER JOIN estat e ON a.estat_anime=e.id_estat ORDER BY nom_anime;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) { ?>
    <table class="table table-hover table-bordered" style="background-color:transparent !important">
          <tr class="success">          
            <th class="verd">Editar</th>
            <th class="verd">Esborrar</th>
            <th class="verd">Nom</th>
            <th class="verd">Autor</th>
            <th class="verd">Data</th>
            <th class="verd">Sinopsis</th>
            <th class="verd">Puntuació</th>
            <th class="verd">Capitols</th>
            <th class="verd">Genere</th>
            <th class="verd">Tipus</th>
            <th class="verd">Estat</th>
          </tr>
        </thead>
        <tbody>
        <?php  // output data of each row
            while($row = $result->fetch_assoc()) { ?>
                <tr>
                <td><center><a href="form_anime.php?operacio=edit&id_anime=<?=$row["id_anime"]?>" data-toggle="modal"><span class="glyphicon glyphicon-edit "></span></a></center></td>
                <td><center><a href="esborrar_anime.php?id_anime=<?=$row["id_anime"]?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove "></span></a></center></td>
                                    
                    <td style="color:white"><?=$row["nom_anime"]?></td>
                    <td style="color:white"><?=$row["autor_anime"]?> 
                    <td style="color:white"><?=$row["data_anime"]?>
                    <td style="color:white"><?=$row["sinopsis_anime"]?></td>
                    <td style="color:white"><?=$row["puntuacio_anime"]?></td>
                    <td style="color:white"><?=$row["capitols_anime"]?></td>
                    <td style="color:white"><?=$row["nom_genere"]?></td>
                    <td style="color:white"><?=$row["nom_tipus"]?></td>
                    <td style="color:white"><?=$row["nom_estat"]?></td>
                </tr>
    <?php   } ?>
        </tbody>
    </table>        
<?php
    } else {
    
    }
    tancarConnexioBD();
?>
<a href="form_anime.php?operacio=new" size="50" class="button">Crear nou Animes</a>

      </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
    <script>
        $('#id_anime').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
        <!-- Scripts -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>