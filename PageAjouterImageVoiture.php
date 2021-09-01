<?php
    if (isset($_POST["Pays"], $_POST["Ville"], $_POST["Marque"], $_POST["Modele"], $_POST["Prix"], $_POST["Description"])){
        $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
        $connection->set_charset("utf8");
        mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
        $requete = $connection->query("SELECT * FROM `informations` WHERE id in(select max(id) from informations);");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        $idd = $row['id'] + 1;
        $requeteA = $connection->query("SELECT * FROM `informations` WHERE id = '$row[id]';");
        $requeteA->data_seek(0);
        $rowA = $requeteA->fetch_assoc();
        if(!($_POST["Pays"] == $rowA["Pays"] && $_POST["Ville"] == $rowA["Ville"] && $_POST["Marque"] == $rowA["Marque"] && $_POST["Modele"] == $rowA["Modele"] && $_POST["Prix"] == $rowA["Prix"] && $_POST["Description"] == $rowA["Description"])){
            $connection->query("INSERT into informations VALUES($idd, '$_POST[email]', '$_POST[Marque]', '$_POST[Modele]', '2001/01/31' , '$_POST[Pays]', '$_POST[Ville]', '$_POST[Prix]', '$_POST[Description]', 0);");
            $id = $row['id'] + 1;
        }
        else{
            $id = $row['id'];
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
    <?php include("UploaderImage.php"); ?>
    <link rel = "stylesheet" href="CSS/PageAjouterImageVoiture.css"/>
    <script src = "JavaScript/jquery-3.6.0.min.js"></script>
    <script src = "JavaScript/JS.js"></script>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <form action = "PageAjouterImageVoiture.php" method = "POST" enctype="multipart/form-data">
                    <?php
                        if (isset($id) || isset($_POST["id"])){
                            if(isset($_POST["id"])){
                                $id = isset($_POST["id"]);
                            }
                            echo '<input type = "hidden" name = "id" value = "'.$id.'" />';
                            echo "id = " . $id;
                        }
                    ?>
                    <div id = "DivImportation">
                        <label class = "Text">Importez vos photos</label>
                        <input Type = "file" name = "BoutonImporter" id = "BoutonImporter" value = "Importer" required/><br/>
                    </div>
                    <div id = "BouttonEnvoyer">
                        <input type = "submit" name = "Submit1" id = "SubmetAjouterUneAutre" class = "formulaire" value = "Ajouter l'image" />
                    </div>
                </form>
                <form action = "PageAccueil.php">
                    <div id = "BouttonEnvoyer">
                        <input type = "submit" name = "Submit2" class = "formulaire" value = "Terminer" />
                    </div>
                </form>
            </center>
        </div>
    </div>
    <?php
        if(isset($_POST["Submit1"])){
            echo "</br>Rah " . $_POST["id"];
            $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
            $connection->set_charset("utf8");
            mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
            $requete = $connection->query("SELECT * FROM `imagesvoitures` WHERE Num = (SELECT MAX(Num) FROM `imagesvoitures`);");
            $requete->data_seek(0);
            $row = $requete->fetch_assoc();
            $Idd = $row["Num"] + 1;
            echo "<br/>Id = " . $Idd;
            $image = UploaderImage("BoutonImporter", "Submit1", "Voitures/" . $Idd);
            $connection->query("INSERT into imagesvoitures VALUES($Idd, '$_POST[id]', '$image');");
            $connection = NULL;
        }
        if(isset($_POST["Submit2"])){
            header('location:PageAccueil.php');
            echo "Submit 1 ici !!!!!";
        }
    ?>
</body>
</html>