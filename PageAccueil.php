<?php
    include("UploaderImage.php");
    $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
    $connection->set_charset("utf8");
    mysqli_set_charset($connection, "utf8");
    if (isset($_POST["email"], $_POST["password"])){
        $mail = $_POST["email"];
        $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$mail."';");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        if($_POST["password"] != $row["MotDePasse"]){
            header('location:PageSeConnecter.php');
            echo "Quelque chose qui ne va pas!!!!";
        }
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
        <form action = "PageAccueil.php" method = "POST" id = "FormulaireAccueil">
            <select class = "formulaire" id = "formulaire1" name = "Pays" required>
                <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir le pays</option>
                <?php
                    $requete = $connection->query("SELECT * FROM `pays`");
                    for($i = 0; $i < $requete->num_rows; $i++){
                        $requete->data_seek($i);
                        $row = $requete->fetch_assoc();
                        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['pays'] . ">" . $row['pays'] . "</option>";
                    }
                ?>
            </select>
            <div class = "divDate">
                <div class = "PhraseDate" id = "PhraseDate1">Date de retrait</div>
                <input type = "date" placeholder = "Date" id = "formulaire2" class = "formulaire" name = "DateRetrait"/><br/>
            </div>
            <div class = "divDate">
                <div class = "PhraseDate" id = "PhraseDate2">Date de retour</div>
                <input type = "date" placeholder = "Date" id = "formulaire3" class = "formulaire" name = "DateRetour"/><br/>
            </div>
            <br/>
            <select class = "formulaire" id = "formulaire4" name = "Marque">
                <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la marque</option>
                <?php
                    $requete = $connection->query("SELECT * FROM `marques_noms` ORDER BY 'Marque'");
                    for($i = 0; $i < $requete->num_rows; $i++){
                        $requete->data_seek($i);
                        $row = $requete->fetch_assoc();
                        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['Marque'] . ">" . $row['Marque'] . "</option>";
                    }
                ?>
            </select>
            <?php
                if(isset($_POST["email"], $_POST["password"])){
                    echo '
                        <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                        <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                    ';
                }
            ?>
            <input type = "submit" value = "Envoyer"  class = "formulaire" id = "formulaire5"/>
        </form>
        <img src="Images/image de recherche.png" id = "image_LocationDeVoitures"/>
    </center>
    <?php
        include("Publicite.php");
        if(isset($_POST['Pays'])){
            $Condition = "Pays = '".$_POST['Pays']."'";
            if($_POST['DateRetrait']){
                $Condition = $Condition . " && (DateDebutDisponible = NULL || DateDebutDisponible <= '".$_POST['DateRetrait']."')";
            }
            if($_POST['DateRetour']){
                $Condition = $Condition . " && (DateFinDisponible = NULL || DateFinDisponible >= '".$_POST['DateRetour']."')";
            }
            if(isset($_POST['Marque'])){
                $Condition = $Condition . " && Marque = '".$_POST['Marque']."'";
            }
            $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE $Condition;");
            for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
                $RequeteFiltre->data_seek($i);
                $RowFiltre = $RequeteFiltre->fetch_assoc();
                Publicite($RowFiltre['id']);
            }
        }
        $connection = NULL;
    ?>
</body>
</html>