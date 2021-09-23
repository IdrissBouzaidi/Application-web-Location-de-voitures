<?php
    session_start();
    if(!isset($_POST["Pays"]) && !isset($_POST["id"])){
        header("location:PageAccueil.php");
    }
    include("Connexion.php");
    if (isset($_POST["Pays"])){
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
            $Resultat = "INSERT into informations VALUES($idd, '$_SESSION[email]', '$_POST[Marque]', '$_POST[Modele]', NULL, NULL , '$_POST[Pays]', '$_POST[Ville]', '$_POST[Prix]', '$description', 0, '$_POST[Circulation]', '$_POST[CO2]', '$_POST[PuissanceReelle]', '$_POST[PuissanceFiscale]', '$_POST[Portes]', '$_POST[Places]', '$_POST[largeur]', '$_POST[Longueur]');";
            $id = $row['id'] + 1;
        }
        else{
            $id = $row['id'];
        }
        $PremiereImage = 0;//Cette variable prend 0 si aucune voiture n'est encore uploadée, et 1 sinon.
    }
    else{
        $PremiereImage = 1;
        if(isset($_POST["Resultat"])){
            $connection->query($_POST["Resultat"]);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoID</title>
    <link rel="shortcut icon" href="Images/Onglet.ico" type="image/x-icon" />
    <?php include("Menu.php"); ?>
    <?php include("UploaderImage.php"); ?>
    <link rel = "stylesheet" href="CSS/PageAjouterImageVoiture.css"/>
    <script src = "JavaScript/jquery-3.6.0.js"></script>
</head>
<body>
    <div id = "ApresMenu">
        <center>
            <div id = "BackgroundConnexion">
                <form action = "PageAjouterImageVoiture.php" method = "POST" enctype="multipart/form-data">
                    <?php
                        if (isset($id) || isset($_POST["id"])){
                            if(isset($_POST["id"])){//Ici lorsqu'on a déja déposé une voiture.
                                $id = $_POST["id"];
                            }
                            echo '<input type = "hidden" name = "id" value = "'.$id.'" />';
                        }
                    ?>
                    <div id = "DivImportation">
                        <label class = "Text">Importez vos photos</label>
                        <input Type = "file" name = "BoutonImporter" id = "BoutonImporter" value = "Importer" required/><br/>
                    </div>
                    <div id = "BouttonEnvoyer">
                        <?php
                            if(!isset($_POST["Resultat"]) && isset($Resultat)){
                                echo '<input type = "hidden" name = "Resultat" value = "'.$Resultat.'" />';
                            }
                        ?>
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
                }
                ?>
                </form>
            </div>
        </center>
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
            $image = UploaderImage("BoutonImporter", "Voitures/" . $Idd);
            $connection->query("INSERT into imagesvoitures VALUES($Idd, '$_POST[id]', '$image');");
        }
        if(isset($_POST["Submit2"])){
            header('location:PageAccueil.php');
        }
    ?>
</body>
</html>
<script>
    $(document).ready(function(){
        var size = $(window).width();
        if(size<1000){
            $("#BackgroundConnexion").css({"margin-left" : "250px",
                                           "width" : "500px"
                                        });
        }
        else{
            $("#BackgroundConnexion").css({"margin-left" : "25%",
                                           "width" : "50%"
                                          });
        }
        $(window).on('resize', function(){
            size = $(window).width();
            if(size<1000){
                $("#BackgroundConnexion").css({"margin-left" : "250px",
                                               "width" : "500px"
                                            });
            }
            else{
                $("#BackgroundConnexion").css({"margin-left" : "25%",
                                               "width" : "50%"
                                            });
            }
        });

        $(".formulaire").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $(".formulaire").mouseleave(function(){
            $(this).css("background-color", "rgb(26, 115, 232)");
        });
    });
</script>