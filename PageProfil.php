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
    <?php
        if(isset($_POST['DateDebut'])){
            $date1 = $_POST['DateDebut'];
            $date2 = $_POST['DateFin'];
            if(!$_POST['DateDebut'] || !$_POST['DateFin'] || $_POST['DateDebut']<$_POST['DateFin']){
                if($_POST['DateDebut']){
                    $connection->query("UPDATE informations SET DateDebutDisponible = '".$_POST['DateDebut']."' WHERE id = '$_POST[id]';");
                }
                else{
                    $connection->query("UPDATE informations SET DateDebutDisponible = NULL WHERE id = '$_POST[id]';");
                }
                if($_POST['DateFin']){
                    $connection->query("UPDATE informations SET DateFinDisponible = '".$_POST['DateFin']."' WHERE id = '$_POST[id]';");
                }
                else{
                    $connection->query("UPDATE informations SET DateFinDisponible = NULL WHERE id = '$_POST[id]';");
                }
            }
            $connection = NULL;
    ?>
    <link rel = "stylesheet" href="CSS/PageSeConnecter.css"/>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <div style = "background-color: red; width: 10px;"></div>
            <center>
                <p id = "PremierText">
                    <?php
                        if(!$_POST['DateDebut'] || !$_POST['DateFin'] || $_POST['DateDebut']<$_POST['DateFin']){
                    ?>
                    Le changement a été avec succés
                    <?php
                        }
                        else{
                            echo "La date de début doit être avant la date de fin";
                        }
                    ?>
                </p>
            </center>
            <?php
                if(!$_POST['DateDebut'] || !$_POST['DateFin'] || $_POST['DateDebut']<$_POST['DateFin']){
            ?>
            <form action = "PagePublicite.php" method = "POST">
                <div>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Voir la publicité" style = "width: 155px;">
                            <input type = "hidden" name = "Ne_vient_pas_de_la_page_publicite" value = "iddd" />
                        </div>
                    </div>
                </div>
            <?php
                }
                else{
            ?>
            <form action = "PageModifierTemps.php" method = "POST">
                <div>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Réessayer" style = "width: 115px;">
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
                <?php
                    if(isset($_POST['DateDebut'])){
                        echo '
                            <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                            <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                            <input type = "hidden" name = "id" value = "'.$_POST["id"].'" />
                        ';
                    }
                ?>
            </form>
        </div>
    </div>
    <?php
        }
        else{
    ?>
    <div id = "ApresMenu">
        <div id = "BackgroundPublicite">
            <?php
            $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
            $connection->set_charset("utf8");
            mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
            if(isset($_POST['id'])){
                $requete = $connection->query("select * from informations where id = '".$_POST['id']."';");
                $requete2 = $connection->query("select * from utilisateurs where Adresse = (SELECT AdresseUtilisateur FROM informations WHERE id = '".$_POST['id']."');");
            }
            else if(isset($_POST["email"], $_POST["password"])){
                $requete = $connection->query("select * from informations where AdresseUtilisateur = '$_POST[email]';");
                $requete2 = $connection->query("select * from utilisateurs where Adresse = '$_POST[email]';");
            }
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
    <script>
        var i = 0;
    </script>
    <?php
            include("Publicite.php");
            if(isset($_POST['id'])){
                $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = (SELECT AdresseUtilisateur FROM `informations` WHERE id = '$_POST[id]');");
            }
            else{
                $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = '$_POST[email]';");
            }
            for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
                $RequeteFiltre->data_seek($i);
                $RowFiltre = $RequeteFiltre->fetch_assoc();
                Publicite($RowFiltre['id']);
            }
        }
    ?>
</body>