<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="CSS/Publicite.css"/>
</head>
<body>
    <?php
        $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
        $requete = $connection->query("select * from pays");
    ?>
    <?php
        $requete = $connection->query("select * from informations where id = '1';");
        $requete3 = $connection->query("select * from imagesvoitures where id = '1';");
        $requete->data_seek(0);
        $requete3->data_seek(0);
        $row = $requete->fetch_assoc();
        $row3 = $requete3->fetch_assoc();
        echo '
            <form id = "HiddenPublicite" action = "PagePublicite.php" method = "POST">
                <input type = "hidden" name = "id" value = "'.$row["id"].'" />
        ';
        if(isset($_POST["email"], $_POST["password"])){
            echo '
                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
            ';
        }
        echo '</form>';
    ?>
    <a href = "#" OnClick = "document.getElementById('HiddenPublicite').submit()">
        <div id = "BackgroundPublicite">
            <div id = "DivImagePublicite">
                <img src = "<?php
                    echo $row3['CheminImage'];
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