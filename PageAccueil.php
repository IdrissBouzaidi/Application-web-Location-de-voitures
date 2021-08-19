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
                ?>
            </select>
            <input type = "submit" value = "Envoyer"  class = "formulaire" id = "formulaire5"/>
        </form>
        <img src="Images/image de recherche.png" id = "image_LocationDeVoitures"/>
    </center>
    <a href="PagePublicite.php" target = "blank">
        <div id = "BackgroundPublicite">
            <?php
                $requete = $connection->query("select * from informations where id = 1");
                $requete->data_seek(0);
                $row = $requete->fetch_assoc();
            ?>
            <div id = "DivImagePublicite">
                <img src = "<?php
                    echo $row['Image'];
                ?>"
                id="ImagePublicite" />
            </div>
            <div style = "display : inline-block;">
                <div id = "DivText1Publicite">
                    <p class = "TitresPublicite">Pays :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Pays'];?></p><br/>
                    <p class = "TitresPublicite">Marque :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Marque'];?></p>
                </div>
                <div id = "DivText2Publicite">
                    <p class = "TitresPublicite">Ville :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Ville'];?></p><br/>
                    <p class = "TitresPublicite">Modèle :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Modele'];?></p>
                </div>
                <div id = "DivText3Publicite">
                    <p class = "TitresPublicite Prix_et_Occupation_et_leurs_valeurs">Prix   :</p>
                    <p class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs"><?php echo $row['Prix'];?></p>
                    <p  class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs" id = "DH_jour">DH / jour</p>
                    <hr noshade align="left" id = "Ligne_horizontal_Publicite">
                    <p class = "TitresPublicite Prix_et_Occupation_et_leurs_valeurs">Occupation :</p>
                    <p class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs">Disponible</p>
                </div>
            </div>
        </div>
    </a>
</body>