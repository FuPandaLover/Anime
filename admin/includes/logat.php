<?php
    session_start();
	if (isset($_SESSION["nom_usuari"])) {
        if ($_SESSION["nom_usuari"]=="") {
            header("Location:login.php");
	   }
    } else {
        header("Location:login.php");        
    } ?>
