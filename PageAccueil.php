
<?php
    include("UploaderImage.php");
    if (isset($_POST["email"], $_POST["password"])){
        $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
        $connection->set_charset("utf8");
        mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
        $mail = $_POST["email"];
        $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$mail."';");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        if($_POST["password"] != $row["MotDePasse"]){
            header('location:PageSeConnecter.php');
            echo "Quelque chose qui ne va pas!!!!";
        }
        $connection = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PageAccueil.css"/>
</head>
<body>
    <center id = "ApresMenu">
        <form action = "php.php" method = "POST" id = "FormulaireAccueil">
            <select class = "formulaire" id = "formulaire1">
                <option value="Choisir le pays" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir le pays</option>
                <?php
                    $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
                    $requete = $connection->query("select * from pays");
                    for($i = 0; $i < $requete->num_rows; $i++){
                        $requete->data_seek($i);
                        $row = $requete->fetch_assoc();
                        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['pays'] . ">" . $row['pays'] . "</option>";
                    }
                ?>
            </select>
            <div class = "divDate">
                <div class = "PhraseDate" id = "PhraseDate1">Date de retrait</div>
                <input type = "date" placeholder = "Date" id = "formulaire2" class = "formulaire"/><br/>
            </div>
            <div class = "divDate">
                <div class = "PhraseDate" id = "PhraseDate2">Date de retour</div>
                <input type = "date" placeholder = "Date" id = "formulaire3" class = "formulaire"/><br/>
            </div>
            <br/>
            <select class = "formulaire" id = "formulaire4">
                <option value="Choisir la marque" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la marque</option>
                <?php
                    $requete = $connection->query("select * from marques_noms order by 'marque'");
                    for($i = 0; $i < $requete->num_rows; $i++){
                        $requete->data_seek($i);
                        $row = $requete->fetch_assoc();
                        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['marque'] . ">" . $row['marque'] . "</option>";
                    }
                    $connection = NULL;
                ?>
            </select>
            <input type = "submit" value = "Envoyer"  class = "formulaire" id = "formulaire5"/>
        </form>
        <img src="Images/image de recherche.png" id = "image_LocationDeVoitures"/>
    </center>
    <?php include("Publicite.php"); ?>
</body>