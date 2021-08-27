<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("Menu.php"); ?>
    <link rel = "stylesheet" href="CSS/PagePublicite.css"/>
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
            $requete3 = $connection->query("select * from imagesvoitures where id = '".$_POST['id']."';");
            $requete->data_seek(0);
            $requete2->data_seek(0);
            $requete3->data_seek(0);
            $row = $requete->fetch_assoc();
            $row2 = $requete2->fetch_assoc();
            $row3 = $requete3->fetch_assoc();
            ?>
            <div id = "Publicite1ereParagraphe">
                <img src = "<?php
                    echo $row3['CheminImage'];
                ?>" id = "ImagePublicite" />
                <div id = "ComptePublicite">
                    <?php
                        echo '
                            <form id = "HiddenProfil" action = "PageProfil.php" method = "POST">
                            <input type = "hidden" name = "id" value = "'.$_POST["id"].'" />
                            ';
                        if(isset($_POST["email"], $_POST["password"])){
                            echo '
                                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                            ';
                        }
                        echo '</form>';
                    ?>
                    <a href = "#" OnClick = "document.getElementById('HiddenProfil').submit()">
                    <center>
                        <p class = "ValeursPublicite" style = "margin-left: 0%;"><?php echo $row2['Prenom'] . " " . $row2['Nom'];?></p><br/>
                            <img src = "<?php
                            echo $row2['Image'];
                        ?>" id = "ImageUtilisateurPublicite" />
                    </center>
                    </a>
                </div>
            </div>
            <div id = "Publicite2emeParagraphe">
                <div id = "Publicite2emeParagrapheLeft">
                    <p class = "TitresPublicite">Pays :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Pays'];?></p><br/>
                    <p class = "TitresPublicite">Marque :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Marque'];?></p></br>
                    <p class = "TitresPublicite">Prix   :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Prix'];?></p>
                    <p  class = "ValeursPublicite" id = "DH_jour">DH / jour</p>
                </div>
                <div id = "Publicite2emeParagrapheRight">
                    <p class = "TitresPublicite">Ville :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Ville'];?></p><br/>
                    <p class = "TitresPublicite">Modèle :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Modele'];?></p></br>
                    <p class = "TitresPublicite">Téléphone :</p>
                    <p class = "ValeursPublicite"><?php echo $row2['Telephone'];?></p>
                </div>
            </div>
            <div id = "Publicite3emeParagraphe">
                <?php
                    $Desc = $row['Description'];
                    echo '<p id = "PremierLettreDuText">' . substr($Desc, 0, 1) . '</p>';
                    echo substr($Desc, 1);
                ?>
            </div>
        </div>
    </div>
</body>
