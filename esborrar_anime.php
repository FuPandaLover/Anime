<?php
    $id_anime=$_REQUEST["id_anime"];
    include "includes/bootstrap.php";
    include "includes/connexio.php";
    obrirConnexioBD();
    $sql = ("DELETE FROM anime WHERE id_anime = '$id_anime'");
    if ($conn->query($sql) === TRUE) {
        tancarConnexioBD();
        header("Location: llistat_anime.php");
    } else { ?>
        <!DOCTYPE html>
        <html lang="en">
            <?php bsHead("Esborrat"); ?>
            <body>
                <div class="alert alert-danger" role="alert">
                    <h3>Error esborrant anime</h3>
                    <p><?=$conn->error?></p>
                </div>
            </body>
        </html>
<?php
    }
    tancarConnexioBD();
?>
