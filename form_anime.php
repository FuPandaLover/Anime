      
      
      <head>	<title>Formulari Anime</title> </head>
      <?php
    include "includes/bootstrap.php";
    include "includes/connexio.php";
    $operacio="";
    if (isset($_REQUEST["operacio"])) $operacio=$_REQUEST["operacio"];
    if ($operacio!="new" && $operacio!="edit") header("Location: llistat_anime.php");
    obrirConnexioBD();
    if ($operacio=="edit") {
        if (isset($_REQUEST["id_anime"])) {
            $id_anime=$_REQUEST["id_anime"];
            $sql = "SELECT * FROM anime a INNER JOIN genere g ON a.genere_anime=g.id_genere INNER JOIN tipus t ON a.tipus_anime=t.id_tipus INNER JOIN estat e ON a.estat_anime=e.id_estat where id_anime=" . $id_anime;
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
                tancarConnexioBD();
                header("Location: llistat_anime.php");
            } else {
                $row = $result->fetch_assoc();
            }
        } else {
            header("Location: llistat_anime.php");
        }
    }
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
					<h1 id="logo"><a href="index.html">AnimeZone</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">AnimeZone</a></li>
							<li><a href="llistat_anime.php" class="button primary">Llistar Animes</a></li>
						</ul>
                    </nav>
</header>


      
	<div class="container">
    <br>
		<h3><center>Formulari--Anime</center></h3>
        <div class="row myform">
			<div class="col-md-7 col-md-offset-3" > 
                <div class="alert alert-success" style="color:red; background-color: rgb(46, 46, 48);">
				<form name="form_animes" action="mod_anime.php?operacio=<?=$operacio?>" role="form" method="post">  
             
						<input type="hidden" style="color:red background-color:black;" name="id_anime" id="id_anime" class="form-form-control-lg" placeholder="Introdueix el nom de l'anime:" value="<?php if (isset($row)) echo $row["id_anime"]?>"/>


                    <div class="form-group">
						<label class="control-label" style="color:red;" for="nom_anime">Nom:</label>
						<input required type="text" size="50" style="color:white; background-color:black;" name="nom_anime" id="nom_anime" class="form-form-control-lg" placeholder="Introdueix el nom de l'anime:" value="<?php if (isset($row)) echo $row["nom_anime"]?>"/>
					</div>

                    <div class="form-group">
						<label class="control-label" style="color:red;" for="autor_anime">Autor:</label>
						<input required type="text" size="50" style="color:white; background-color:black;" name="autor_anime" id="autor_anime" class="form-form-control-lg" placeholder="Introdueix el nom de l'autor:" value="<?php if (isset($row)) echo $row["autor_anime"]?>"/>
					</div> 

                    <div class="form-group">
						<label class="control-label" style="color:red;" for="data_anime">Data:</label>
						<input required type="number" size="50" style="color:white; background-color:black;" name="data_anime" id="data_anime" class="form-form-control-lg" placeholder="   Any de creació" value="<?php if (isset($row)) echo $row["data_anime"]?>"/>
					</div>    
<!--
                    <div class="form-group">
						<label class="control-label" style="color:red;" for="sinopsis_anime">Sinopsis:</label>
						<input required type="text" style="color:red;" name="sinopsis_anime" id="sinopsis_anime" class="form-control" placeholder="Sinopsis:" value="<?php if (isset($row)) echo $row["sinopsis_anime"]?>"/>
                    </div>   
                    !-->
                  					<div class="form-group">
							<label class="control-label" style="color:red;" for="puntuacio_anime">Puntuació:</label>
							<input required type="number" style="color:white; background-color:black;"  name="puntuacio_anime" id="puntuacio_anime" class="form-form-control-lg" placeholder="  Puntuacio de l'1 al 9 " value="<?php if (isset($row)) echo $row["puntuacio_anime"]?>"/>
                        </div>

                        <div class="form-group">
							<label class="control-label" style="color:red;" for="capitols_anime">Capitols Anime:</label>
							<input required type="number" style="color:white; background-color:black;" name="capitols_anime" id="capitols_anime" class="form-form-control-lg" placeholder="   Capitols del anime" value="<?php if (isset($row)) echo $row["capitols_anime"]?>"/>
                        </div>

                        <div class="form-group">
                        <option selected style="color:red">Genere</option>
                        <select class="form-form-control-lg" id="genere_anime" name="genere_anime" style="color:white; background-color:black;">
                        <?php   $sql = "SELECT * FROM genere ORDER BY nom_genere;";
                        $resultSelect = $conn->query($sql);
                        while ($rowSelect = $resultSelect->fetch_assoc()) { ?>
                        <option value="<?=$rowSelect["id_genere"]?>"<?php if (isset($row)) if ($row["nom_genere"]==$rowSelect["id_genere"]) echo " checked";?>><?=$rowSelect["nom_genere"]?> </option>
                       <?php   } ?>                       
                        </select>
                            </div>

                         <div class="form-group">
                        <option selected style="color:red" >Tipus</option>
                        <select class="form-form-control-lg" id="tipus_anime" name="tipus_anime" style="color:white; background-color:black;">
                        <?php   $sql = "SELECT * FROM tipus ORDER BY nom_tipus;";
                        $resultSelect = $conn->query($sql);
                        while ($rowSelect = $resultSelect->fetch_assoc()) { ?>
                        <option value="<?=$rowSelect["id_tipus"]?>"<?php if (isset($row)) if ($row["nom_tipus"]==$rowSelect["id_tipus"]) echo " checked";?>><?=$rowSelect["nom_tipus"]?> </option>
                       <?php   } ?>                       
                        </select>
                            </div>

                        <div class="form-group">
                        <option selected style="color:red">Estat</option>
                        <select class="form-form-control-lg" id="estat_anime" name="estat_anime" style="color:white; background-color:black;">
                        <?php   $sql = "SELECT * FROM estat ORDER BY nom_estat;";
                        $resultSelect = $conn->query($sql);
                        while ($rowSelect = $resultSelect->fetch_assoc()) { ?>
                        <option value="<?=$rowSelect["id_estat"]?>"<?php if (isset($row)) if ($row["nom_estat"]==$rowSelect["id_estat"]) echo " checked";?>><?=$rowSelect["nom_estat"]?> </option>
                       <?php   } ?>                       
                        </select>
                            </div>

                            <div class="form-group">
                        <label style="color:red;"class="control-label" for="sinopsis_anime">Sinopsis:</label>
                        <textarea style="color:white"class="form-form-control-lg" name="sinopsis_anime" id="sinopsis_anime" value="<?php if (isset($row)) echo $row["sinopsis_anime"]?>"/></textarea>
                    </div>

                    <br>
                    <div class="form-group">
                        <center>
                            <button type="submit" style="background-color:red;" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> Crear/modificar Anime</button>
                        </center>
                    </div>
				</form>
			</div>
    	</div>
	</div>
    <?php tancarConnexioBD(); ?>
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