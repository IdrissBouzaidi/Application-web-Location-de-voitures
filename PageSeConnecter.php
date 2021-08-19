<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageSeConnecter.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <p id = "PremierText">
                    Connectez vous pour pouvoir déposer vos voitures, et voir les voitures par lesquelles vous êtes intéressés
                </p>
                <form>
                    <input type = "email" class = "formulaire" placeholder = "Saisir votre adresse"><br/>
                    <input type = "password" class = "formulaire" placeholder = "Saisir votre mot de passe">
                </form>
            </center>
            <div>
                <div id = "BouttonCreerCompte">
                    <center>
                        <a href = "PageCreaerCompte.php" style = "text-decoration:none; color: unset;" >
                            <p">
                            Créer un compte
                            </p>
                        </a>
                </center>
                </div>
                <div id = "DivConnexion">
                    <form id = "BouttonEnvoyer">
                        <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Connexion">
                    </form>
                </div>
            </div>
        </div>
</center>
</body>
</html>