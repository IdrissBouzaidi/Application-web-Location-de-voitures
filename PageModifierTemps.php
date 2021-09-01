<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageModifierTemps.css"/>
    <script src = "JavaScript/jquery-3.6.0.min.js"></script>
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
                        <input type = "submit" name = "Submit1" class = "Bouton" value = "Valider" />
                    </div>
                </center>
                <?php
                    if(isset($_POST["email"], $_POST["password"])){
                        echo '
                            <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                            <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                            <input type = "hidden" name = "id" value = "'.$_POST["id"].'" />
                        ';
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>