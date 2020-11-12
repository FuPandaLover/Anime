<?php
    include "includes/bootstrap.php";
    include "includes/connexio.php";
    $operacio="";
    if (isset($_REQUEST["operacio"])) $operacio=$_REQUEST["operacio"];
    if ($operacio!="new" && $operacio!="edit") header("Location: llistat_anime.php");
    $id_anime=$_REQUEST["id_anime"];
    $nom_anime=$_REQUEST["nom_anime"];
    $autor_anime=$_REQUEST["autor_anime"];
    $data_anime=$_REQUEST["data_anime"];
    $tipus_anime=$_REQUEST["tipus_anime"];
    $estat_anime=$_REQUEST["estat_anime"];
    $sinopsis_anime=$_REQUEST["sinopsis_anime"];
    $puntuacio_anime=$_REQUEST["puntuacio_anime"];
    $genere_anime=$_REQUEST["genere_anime"];
    $capitols_anime=$_REQUEST["capitols_anime"];
    

  

    if ($operacio=="new") {
        $sql="INSERT INTO anime (nom_anime, autor_anime, data_anime, sinopsis_anime, puntuacio_anime , capitols_anime, genere_anime, tipus_anime, estat_anime)  VALUES (\"$nom_anime\", \"$autor_anime\", \"$data_anime\", \"$sinopsis_anime\" , \"$puntuacio_anime\", \"$capitols_anime\", \"$genere_anime\" , \"$tipus_anime\", \"$estat_anime\");"; 
    } else {

        $sql="UPDATE anime SET nom_anime=\"$nom_anime\",autor_anime=\"$autor_anime\",data_anime=\"$data_anime\",sinopsis_anime=\"$sinopsis_anime\",puntuacio_anime=\"$puntuacio_anime\",capitols_anime=\"$capitols_anime\",genere_anime=\"$genere_anime\",tipus_anime=$tipus_anime, estat_anime=\"$estat_anime\" WHERE id_anime=\"$id_anime\";";
  
        
    }
        obrirConnexioBD();
    if ($conn->query($sql) === TRUE) {
        tancarConnexioBD();
        header("Location: llistat_anime.php");
    } else { ?>
        <!DOCTYPE html>
        <html lang="en">
            <?php bsHead("Creat/modificat"); ?>
            <body>
                <div class="alert alert-danger" role="alert">
                    <h3>Error creant/modificant Anime (sisuplau siggui riguros amb les dades que s'introdueix)</h3>
                    <p><?=$conn->error?></p>
                </div>
            </body>
        </html>
<?php
    }
    tancarConnexioBD();
?>