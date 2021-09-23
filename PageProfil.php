<?php
    session_start();
    include("Connexion.php");
    if(isset($_POST["Numero"])){
        $Numero = $_POST["Numero"];
    }
    else{
        $Numero = 0;
    }
    if(isset($_POST["id"])){
        echo '<input type = "hidden" name = "id" value = "'.$_POST["id"].'" />';
    }
    echo '</form>';
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
            <form action = "PagePublicite.php?id=<?php echo $_POST['id']; ?>" method = "POST">
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
        <div id = "BackgroundPublicite" class = "BackgroundPublicite">
            <?php
            if(isset($_GET['id'])){
                $requete = $connection->query("select * from informations where id = '".$_GET['id']."';");
                $requete2 = $connection->query("select * from utilisateurs where id = '".$_GET['id']."';");
            }
            else if(isset($_SESSION["email"])){
                $requete = $connection->query("select * from informations where AdresseUtilisateur = '$_SESSION[email]';");
                $requete2 = $connection->query("select * from utilisateurs where Adresse = '$_SESSION[email]';");
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
    <div id = "AjouterPublicites">
        <?php
            include("Publicite.php");
            if(isset($_GET['id'])){
                $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = (SELECT Adresse FROM `utilisateurs` WHERE id = '$_GET[id]') ORDER BY NombreVisites DESC LIMIT 5 OFFSET $Numero;");
                $len = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = (SELECT Adresse FROM `utilisateurs` WHERE id = '$_GET[id]');")->num_rows;
            }
            else{
                $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = '$_SESSION[email]' ORDER BY NombreVisites DESC LIMIT 5 OFFSET $Numero;");
                $len = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = '$_SESSION[email]';")->num_rows;
            }
            for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
                $RequeteFiltre->data_seek($i);
                $RowFiltre = $RequeteFiltre->fetch_assoc();
                Publicite($RowFiltre['id']);
            }
        }
        ?>
    </div>
    <div id = "CenterBoutonAjouterBublicite">
        <a id = "PageSuivante" style = "text-decoration: none;">
            <img src = "Images/AjouterPlusDePublicites.png" id = "ImageAutresPublicites"/>
            <p id = "AutresPublicites">Page suivante</p>
        </a>
    </div>
</body>
<script>
    $(document).ready(function(){
        var i = 0;
        var len = <?php if(isset($len)){
                    echo $len;
                    }
                    else{
                        echo 0;
                    }
                ?>;
        if(i + 5 >= len){
            $("#CenterBoutonAjouterBublicite").hide();
        }
        $("#PageSuivante").click(function(){
            i += 5;
            var id = "<?php
                    if(isset($_GET['id'])){
                        echo $_GET["id"];
                    }
                    else{
                        $Requete = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = '$_SESSION[email]' LIMIT 1;");
                        $Requete->data_seek(0);
                        $Row = $Requete->fetch_assoc();
                        echo $Row['id'];
                    } ?>";
            var nbre = {
                nbre : i,
                id : id
            }
            var nombre = JSON.stringify(nbre);
            $.post("AJAX/AjouterPubliciters.php", {v:nombre}).then(function(data){
                $('#AjouterPublicites').append(data);
            });
            len = <?php if(isset($len)){
                            echo $len;
                        }
                        else{
                            echo 0;
                        }
                 ?>;
            if(i + 5 >= len){
                $("#CenterBoutonAjouterBublicite").hide();
            }
        });

        var size = $(window).width();
        if(size<1000){
            $(".BackgroundPublicite").css({"margin-left" : "100px",
                                           "width" : "800px"
                                        });
            $("#CenterBoutonAjouterBublicite").css("margin-left", "420px");
        }
        else{
            $(".BackgroundPublicite").css({"margin-left" : "10%",
                                           "width" : "80%"
                                          });
            $("#CenterBoutonAjouterBublicite").css({"margin-left" : "auto", "margin-right" : "auto"});
        }
        $(window).on('resize', function(){
            size = $(window).width();
            if(size<1000){
                $(".BackgroundPublicite").css({"margin-left" : "100px",
                                            "width" : "800px"
                                            });
                $("#CenterBoutonAjouterBublicite").css("margin-left", "420px");
            }
            else{
                $(".BackgroundPublicite").css({"margin-left" : "10%",
                                            "width" : "80%"
                                            });
                $("#CenterBoutonAjouterBublicite").css({"margin-left" : "auto", "margin-right" : "auto"});
            }
        });

        
        $("#CenterBoutonAjouterBublicite").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#CenterBoutonAjouterBublicite").mouseleave(function(){
            $(this).css("background-color", "rgb(17, 106, 179)");
        });

        var longueur = $("#PremiereParagrapheImage").height();//On récupére la longueur de l'image de profil pour donner la valeur de la variable "longue" à son arrière plan.
        $("#BackgroundPublicite").css("height", longueur * 1.2);
        $("#Publicite1ereParagraphe").css({"margin-top" : 0.075 * longueur});
    });
</script>
<?php
    $connection = NULL;
?>