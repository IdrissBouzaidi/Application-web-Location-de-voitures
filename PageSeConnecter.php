
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <?php include("UploaderImage.php"); ?>
    <link rel = "stylesheet" href="CSS/PageSeConnecter.css"/>
</head>
<?php
    if (isset($_POST["adresse"], $_POST["mot_de_passe"], $_POST["nom"], $_POST["prenom"], $_POST["telephone"])){
        if($_POST["mot_de_passe"] != $_POST['mot_de_passe_a_nouveau']){

        }
        else{
        $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
        $connection->set_charset("utf8");
        mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
        $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE id in(select max(id) from utilisateurs);");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        $id = $row['id'] + 1;
        $image = UploaderImage("BoutonImporter", "BouttonConnexion", "Utilisateurs/" . $id);
        $connection->query("insert into utilisateurs values($id, '$_POST[adresse]', '$_POST[mot_de_passe]', '$_POST[nom]', '$_POST[prenom]', '$_POST[telephone]', '$image');");
        $connection = NULL;
        }
    }
?>
<body>
    <?php
        if(!isset($_POST['mot_de_passe_a_nouveau']) || $_POST["mot_de_passe"] == $_POST['mot_de_passe_a_nouveau']){
    ?>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <p id = "PremierText">
                    Connectez vous pour pouvoir déposer vos voitures, et voir les voitures par lesquelles vous êtes intéressés
                </p>
            </center>                
            <form action = "PageAccueil.php" method = "POST">
                <center>
                    <input type = "email" class = "formulaire" placeholder = "Saisir votre adresse" name = "email" required><br/>
                    <input type = "password" class = "formulaire" placeholder = "Saisir votre mot de passe" name = "password" required pattern = "[^()'%!,=&$*+]{1,50}">
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
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Connexion">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
        }
        else{
    ?>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <div style = "background-color: red; width: 10px;"></div>
            <p id = "PremierText" style = "margin-left: 20px;">
                &nbsp;&nbsp;&nbsp;&nbsp;Les deux mot de passes que vous avez inséré ne sont pas cohérents, veillez réessayer à nouveau
            </p>
            <form action = "PageCreaerCompte.php" method = "POST">
                <div>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Réessayer">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>