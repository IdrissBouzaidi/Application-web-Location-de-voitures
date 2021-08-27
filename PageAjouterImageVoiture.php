<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageAjouterImageVoiture.css"/>
    <script src = "JavaScript/jquery-3.6.0.min.js"></script>
    <script src = "JavaScript/JS.js"></script>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <form action = "PageAjouterImageVoiture.php">
                    <div id = "DivImportation">
                        <label class = "Text">Importez vos photos</label>
                        <input id = "BoutonImporter" Type = "file" value = "Importer" name = "ImageUploaded"/><br/>
                    </div>
                <div id = "BouttonEnvoyer">
                    <input type = "submit" id = "SubmetAjouterUneAutre" class = "formulaire" value = "Ajouter une autre" />
                </div>
                </form>
                <form action = "PageAccueil.php">
                    <div id = "BouttonEnvoyer">
                        <input type = "submit" class = "formulaire" value = "Terminer" />
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>