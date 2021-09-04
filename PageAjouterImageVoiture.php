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
            $description = $_POST['Description'];
            $description = str_replace("'", "\'", $description);
            $connection->query("INSERT into informations VALUES($idd, '$_POST[email]', '$_POST[Marque]', '$_POST[Modele]', NULL, NULL , '$_POST[Pays]', '$_POST[Ville]', '$_POST[Prix]', '$description', 0);");
            $id = $row['id'] + 1;
        }
        else{
            $id = $row['id'];
        }
        $connection = NULL;
        $PremiereImage = 0;//Cette variable prend 0 si aucune voiture n'est encore uploadée, et 1 sinon.
    }
    else{
        $PremiereImage = 1;
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
                                $id = $_POST["id"];
                            }
                            echo '<input type = "hidden" name = "id" value = "'.$id.'" />';
                        }
                        echo '<input type = "hidden" name = "email" value = "'.$_POST["email"].'" />';
                        echo '<input type = "hidden" name = "password" value = "'.$_POST["password"].'" />';
                    ?>
                    <div id = "DivImportation">
                        <label class = "Text">Importez vos photos</label>
                        <input Type = "file" name = "BoutonImporter" id = "BoutonImporter" value = "Importer" required/><br/>
                    </div>
                    <div id = "BouttonEnvoyer">
                        <input type = "submit" name = "Submit1" id = "SubmetAjouterUneAutre" class = "formulaire" value = "Ajouter l'image" />
                    </div>
                </form>
                <?php
                    if($PremiereImage == 1){
                ?>
                <form action = "PageAccueil.php" method = "POST" enctype="multipart/form-data">
                    <div id = "BouttonEnvoyer">
                        <input type = "submit" name = "Submit2" class = "formulaire" value = "Terminer" />
                    </div>
                <?php
                    echo '<input type = "hidden" name = "email" value = "'.$_POST["email"].'" />';
                    echo '<input type = "hidden" name = "password" value = "'.$_POST["password"].'" />';
                }
                ?>
                </form>
            </center>
        </div>
    </div>
    <?php
        if(isset($_POST["Submit1"])){
            $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
            $connection->set_charset("utf8");
            mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
            $requete = $connection->query("SELECT * FROM `imagesvoitures` WHERE Num = (SELECT MAX(Num) FROM `imagesvoitures`);");
            $requete->data_seek(0);
            $row = $requete->fetch_assoc();
            $Idd = $row["Num"] + 1;
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