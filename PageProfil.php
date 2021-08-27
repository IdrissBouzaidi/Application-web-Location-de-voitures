<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageProfil.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundPublicite">
            <?php
            $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
            $connection->set_charset("utf8");
            mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
            $requete = $connection->query("select * from informations where id = '".$_POST['id']."';");
            $requete2 = $connection->query("select * from utilisateurs where Adresse = (SELECT AdresseUtilisateur FROM informations WHERE id = '".$_POST['id']."');");
            $requete->data_seek(0);
            $requete2->data_seek(0);
            $row = $requete->fetch_assoc();
            $row2 = $requete2->fetch_assoc();
            ?>
            <div id = "Publicite1ereParagraphe">
                <div id = "PremiereParagrapheInformations">
                    <p id = "LeNom">
                        <?php echo $row2['Prenom'] . " " . $row2['Nom'];?>
                    </p><br/>
                    <div id = "Tel">
                        <img src = "Images/Tel.png" id = "ImageTel" />
                        <p id = "ValeurTel"><?php echo $row2['Telephone'];?></p>
            </div>
                </div>
                <img src = "
                <?php
                    echo $row2['Image'];
                ?>" id = "PremiereParagrapheImage" />
            </div>
        </div>
    </div>
    <?php include("Publicite.php"); ?>
</body>