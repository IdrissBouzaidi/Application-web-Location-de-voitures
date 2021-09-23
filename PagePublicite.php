<?php
    session_start();
    include("Connexion.php");
    if(isset($_SESSION["email"])){
        echo '
            <form id = "HiddenModifierTemps" action = "PageModifierTemps.php" method = "POST">
                <input type = "hidden" name = "id" value = "'.$_GET["id"].'" />
            </form>
        ';
    }
?>
<?php
    include("AJAX/IncrementerImage.php");
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
    <link rel = "stylesheet" href="CSS/PagePublicite.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundPublicite">
            <?php
            $requete = $connection->query("select * from informations where id = '".$_GET['id']."';");
            $requete2 = $connection->query("select * from utilisateurs where Adresse = (SELECT AdresseUtilisateur FROM informations WHERE id = '".$_GET['id']."');");
            $requete->data_seek(0);
            $requete2->data_seek(0);
            $row = $requete->fetch_assoc();
            $row2 = $requete2->fetch_assoc();
            if(isset($_POST['NombreVisites']) && !isset($_POST["Ne_vient_pas_de_la_page_publicite"])){
                $connection->query("UPDATE `informations` SET NombreVisites = '".$_POST['NombreVisites']."'+1 WHERE id = '".$_GET['id']."';");
            }
            if(isset($_POST['DateDebut'])){
                $date1 = $_POST['DateDebut'];
                $date2 = $_POST['DateFin'];
                if(!$_POST['DateDebut'] || !$_POST['DateFin'] || $_POST['DateDebut']<$_POST['DateFin']){
                    if($_POST['DateDebut']){
                        $connection->query("UPDATE informations SET DateDebutDisponible = '".$_POST['DateDebut']."' WHERE id = '$_GET[id]';");
                    }
                    else{
                        $connection->query("UPDATE informations SET DateDebutDisponible = NULL WHERE id = '$_GET[id]';");
                    }
                    if($_POST['DateFin']){
                        $connection->query("UPDATE informations SET DateFinDisponible = '".$_POST['DateFin']."' WHERE id = '$_GET[id]';");
                    }
                    else{
                        $connection->query("UPDATE informations SET DateFinDisponible = NULL WHERE id = '$_GET[id]';");
                    }
                }
                else{
                    echo "La date de début doit être avant la date de fin";
                }
            }
            ?>
            <div id = "Publicite1ereParagraphe">
                <div id = "divImagePublicite">
                    <div id = "DivPourFleche" style = "overflow: hidden;">
                    </div>
                    <img src = "Images/Gauche.png" id = "FlecheGauche" />
                    <img src = "Images/Droite.png" id = "FlecheDroite" />
                </div>
                <div id = "ComptePublicite">
                    <a href = "PageProfil.php?id=<?php echo $row2["id"]; ?>" style = "text-decoration: none;">
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
                    <p class = "TitresPublicite2">Disponible :</p>
                    <?php
                        date_default_timezone_set('Africa/Casablanca');
                        $DateActuel = date('Y-m-d', time());
                        if($row['DateFinDisponible']!= NULL && $row['DateFinDisponible']<$DateActuel){
                    ?>
                    <p class = "ValeursPublicite2">Pas disponible pour le moment</p>
                    <?php
                        }
                        else if($row['DateDebutDisponible'] == NULL && $row['DateFinDisponible'] == NULL){
                    ?>
                        <p class = "ValeursPublicite2">Dans tout le temps</p>
                    <?php
                        }
                        else if($row['DateDebutDisponible'] == NULL){
                    ?>
                        <p class = "ValeursPublicite2">Jusqu'à le <?php echo $row['DateFinDisponible']; ?></p>
                    <?php
                        }
                        else if($row['DateFinDisponible'] == NULL){
                    ?>
                        <p class = "ValeursPublicite2">A partir du <?php echo $row['DateDebutDisponible']; ?></p>
                    <?php
                        }
                        else{
                    ?>
                        <p class = "ValeursPublicite2">De <?php echo $row['DateDebutDisponible']; ?> à <?php echo $row['DateFinDisponible']; ?></p>
                    <?php } ?>
                </div>
                <?php if(isset($_SESSION["email"]) && $row["AdresseUtilisateur"] == $_SESSION["email"]){ ?>
                <div class = "DDivOptionsMenu" id = "DDivOptioneMenuSeConnecter">
                    <a href = "#" OnClick = "document.getElementById('HiddenModifierTemps').submit()" style = "text-decoration: none;">
                        <img src = "Images/Temps.png" id = "IImageUtilisateur"/>
                        <p id = "OOptionsMenu"> Modifier les dates </p>
                    </a>
                </div>
                <?php } ?>
            </div>
            <div id = "Publicite3emeParagraphe">
                <div id = "Publicite3emeParagrapheLeft">
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Pays :</p>
                        <?php echo $row['Pays'];?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Marque :</p>
                        <?php echo $row['Marque'];?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Prix   :</p>
                        <?php echo $row['Prix'];?>
                        <p  class = "ValeursPublicite" id = "DH_jour">DH / jour</p>
                    </div>


                    <div class = "ValeursPublicite" style = "font-size: 25px;">
                        <p class = "TitresPublicite" style = "font-size: 25px;">Mise en circulation :</p>
                        <?php echo $row['MiseEnCirculation'];?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Puissance réelle :</p>
                        <?php echo $row['PuissanceReelle'] . " CH";?>
                    </div>
                    <div class = "ValeursPublicite" style = "font-size: 27px;">
                        <p class = "TitresPublicite">Nombre de portes :</p>
                        <?php echo $row['NombrePortes'] . " portes";?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Largeur :</p>
                        <?php echo $row['Largeur'] . " mm";?>
                    </div>


                </div>
                <div id = "Publicite3emeParagrapheRight">
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Ville :</p>
                        <?php echo $row['Ville'];?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Modèle :</p>
                        <?php echo $row['Modele'];?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Téléphone :</p>
                        <?php echo $row2['Telephone'];?>
                    </div>






                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Emission CO2 :</p>
                        <?php echo $row['EmissionCO2'] . " g/Km";?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Puissance fiscale :</p>
                        <?php echo $row['PuissanceFiscale'] . " CV";?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Nombre de places :</p>
                        <?php echo $row['NombrePlaces'] . " places";?>
                    </div>
                    <div class = "ValeursPublicite">
                        <p class = "TitresPublicite">Longueur :</p>
                        <?php echo $row['Longueur'] . " mm";?>
                    </div>






                </div>
            </div>
            <div id = "Publicite4emeParagraphe">
                <?php
                    $Desc = $row['Description'];
                    echo '<p id = "PremierLettreDuText">&nbsp;&nbsp;&nbsp;' . substr($Desc, 0, 1) . '</p>';
                    echo substr($Desc, 1);
                ?>
            </div>
        </div>
    </div>
</body>
<script>
    $("document").ready(function(){
        i = 0;
        var id = "<?php echo $_GET['id']; ?>";
        var nbre = {
            nombre : i,
            id : id,
            gauche : 0//gauche = 0 lorsqu'on ne clique sur aucune flèche, 1 quand on clique sur la flèche gauche, et 2 lorsqu'on clique sur la flèche droite.
        }
        var nombre = JSON.stringify(nbre);
        $.post("AJAX/IncrementerImage.php", {u:nombre}).then(function(data){
            $("#DivPourFleche").html(data);
        });

        $("#FlecheDroite").mouseenter(function(){
            $(this).attr("src", "Images/Droite2.png");
        });
        $("#FlecheDroite").mouseleave(function(){
            $(this).attr("src", "Images/Droite.png");
        });
        $("#FlecheGauche").mouseenter(function(){
            $(this).attr("src", "Images/Gauche2.png");
        });
        $("#FlecheGauche").mouseleave(function(){
            $(this).attr("src", "Images/Gauche.png");
        });

        $("#FlecheDroite").click(function(){
            $("#FlecheDroite").hide();
            $("#FlecheGauche").hide();
            i++;
            var nbre = {
                nombre : i,
                id : id,
                gauche : 1
            }
            var nombre = JSON.stringify(nbre);
            $.post("AJAX/IncrementerImage.php", {u:nombre}).then(function(data){
                $(".ImagePublicite").eq(0).remove();
                $(".ImagePublicite").eq(1).after(data);
                $(".ImagePublicite").eq(2).css({
                    "display": "inline-block",
                    "width": "100%",
                    "margin-right": "-100%"
                });
                $(".ImagePublicite").eq(0).animate({marginLeft : '-100%'}, 1000);
                $(".ImagePublicite").eq(1).animate({marginRight: '0%', marginLeft : '0%'}, 1000);
                $("#FlecheGauche").show();
                $("#FlecheDroite").show();
            });
        });
        $("#FlecheGauche").click(function(){
            $("#FlecheDroite").hide();
            $("#FlecheGauche").hide();
            i--;
            var nbre = {
                nombre : i,
                id : id,
                gauche : 2
            }
            var nombre = JSON.stringify(nbre);
            $.post("AJAX/IncrementerImage.php", {u:nombre}).then(function(data){
                $(".ImagePublicite").eq(2).remove();
                $(".ImagePublicite").eq(1).animate({marginRight : '-100%'}, 1000);
                $(".ImagePublicite").eq(0).animate({marginRight: '0%', marginLeft : '0%'}, 1000);
                $("#DivPourFleche").prepend(data);
                $(".ImagePublicite").eq(0).css({
                    "display": "inline-block",
                    "width": "100%",
                    "margin-left": "-100%"
                });
                $("#FlecheGauche").show();
                $("#FlecheDroite").show();
            });
        });
        
        var size = $(window).width();
        if(size<1000){
            $("#BackgroundPublicite").css({"margin-left" : "85px",
                                           "width" : "850px"
                                        });
        }
        else{
            $("#BackgroundPublicite").css({"margin-left" : "8.5%",
                                           "width" : "85%"
                                          });
        }
        $(window).on('resize', function(){
            size = $(window).width();
            if(size<1000){
                $("#BackgroundPublicite").css({"margin-left" : "85px",
                                            "width" : "850px"
                                            });
            }
            else{
                $("#BackgroundPublicite").css({"margin-left" : "8.5%",
                                            "width" : "85%"
                                            });
            }
        });

        $("#DDivOptioneMenuSeConnecter").mouseenter(function(){
            $(this).css({
                "background-color" : "rgb(255, 110, 50)"
            });
            $("#OOptionsMenu").css("color", "blanchedalmond");
        });
        $("#DDivOptioneMenuSeConnecter").mouseleave(function(){
            $(this).css({
                "background-color" : "burlywood"
            });
            $("#OOptionsMenu").css("color", "rgb(192, 40, 13)");
        });
    });
</script>