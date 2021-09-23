<?php
    session_start();
    if(!isset($_POST["id"])){
        header('location:PageAccueil.php');
    }
    include("Connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoID</title>
    <link rel="shortcut icon" href="Images/Onglet.ico" type="image/x-icon" />
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageModifierTemps.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <p class = "Text" id = "LaPhrase">Veillez saisir l'intervalle de temps dans laquelle la voiture n'est pas occupée</p>
            <form action = "PageProfil.php" method = "POST" enctype="multipart/form-data">
                <div id = "DivImportation">
                    <label class = "Text">Date de début :</label><br/>
                    <input type = "date" class = "formulaire" name = "DateDebut" /><br/>
                    <label class = "Text">Date de fin :</label><br/>
                    <input type = "date" class = "formulaire" name = "DateFin" />
                </div>
                <center>
                    <div id = "DivBouton">
                        <input type = "submit" name = "Submit1" class = "Bouton" id = "Bouton" value = "Valider" />
                    </div>
                </center>
                <?php
                    if(isset($_SESSION["email"])){
                        echo '
                            <input type = "hidden" name = "id" value = "'.$_POST["id"].'" />
                        ';
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#Bouton").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#Bouton").mouseleave(function(){
            $(this).css("background-color", "rgb(26, 115, 232)");
        });
    });
</script>