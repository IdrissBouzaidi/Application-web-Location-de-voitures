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
                <form action = "PageSeConnecter.php" method = "POST" enctype = "multipart/form-data">
                    <input type = "text" name = "nom" class = "formulaire" placeholder = "Saisir votre nom" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "text" name = "prenom" class = "formulaire" placeholder = "Saisir votre prénom" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "email" name = "adresse" class = "formulaire" placeholder = "Saisir une adresse électronique" required><br/>
                    <input type = "password" name = "mot_de_passe" class = "formulaire" placeholder = "Saisir un mot de passe" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "password" name = "mot_de_passe_a_nouveau" class = "formulaire" placeholder = "Réécrir le mot de passe à nouveau" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "tel" name = "telephone" class = "formulaire" placeholder = "Saisir votre numéro de téléphone" required pattern = "[0-9]{8,13}"><br/>
                    <div id = "DivImportation">
                        <label class = "Text" id = "label">Importez votre image</label>
                        <input id = "BoutonImporter" Type = "file" name = "BoutonImporter" value = "Importer" name = "ImageUploaded" required/><br/>
                    </div>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" name = "BouttonConnexion" class = "formulaire" value = "Continuer">
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>