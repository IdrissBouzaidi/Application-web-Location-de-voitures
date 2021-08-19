<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageCreaerCompte.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
            <p class = "Text">
                Veuillez remplir ces informations
            </p>
                <form>
                    <input type = "text" class = "formulaire" placeholder = "Saisir votre Nom"><br/>
                    <input type = "text" class = "formulaire" placeholder = "Saisir votre prénom"><br/>
                    <input type = "email" class = "formulaire" placeholder = "Saisir une adresse électronique"><br/>
                    <input type = "password" class = "formulaire" placeholder = "Saisir un mot de passe"><br/>
                    <input type = "password" class = "formulaire" placeholder = "Réécrir le mot de passe à nouveau"><br/>
                    <input type = "tel" class = "formulaire" placeholder = "Saisir votre numéro de théléphone"><br/>
                    <div id = "DivImportation">
                        <label class = "Text" id = "label">Importez votre image</label>
                        <input id = "BoutonImporter" Type = "file" value = "Importer" name = "ImageUploaded"/><br/>
                    </div>
                </form>
            </center>
            <div id = "divv">
                <form id = "BouttonEnvoyer">
                    <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Continuer">
                </form>
            </div>
        </div>
</center>
</body>
</html>