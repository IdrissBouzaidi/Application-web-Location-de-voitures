<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header('location:PageSeConnecter.php');
    }
    include("Connexion.php");
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
    <link rel = "stylesheet" href="CSS/PageDeposerUnePublicite.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <p class = "Text">
                    Veuillez remplir ces informations
                </p>
                <form action = "PageAjouterImageVoiture.php" method = "POST">
                    <select id = "Pays" name = "Pays" style = "width: 320px; color: rgb(128, 128, 128);" class = "formulaire" required>
                        <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir le pays</option>
                        <?php
                            $requete = $connection->query("select * from pays");
                            $connection->set_charset("utf8");
                            mysqli_set_charset($connection, "utf8");
                            for($i = 0; $i < $requete->num_rows; $i++){
                                $requete->data_seek($i);
                                $row = $requete->fetch_assoc();
                                echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = \"" . $row['pays'] . "\" >" . $row['pays'] . "</option>";
                            }
                        ?>
                    </select>
                    <select id = "Ville" name = "Ville" style = "width: 320px; color: rgb(128, 128, 128);" class = "formulaire" required>
                        <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la ville</option>
                    </select>
                    <select name = "Marque" style = "width: 320px; color: rgb(128, 128, 128);" class = "formulaire" required>
                        <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la marque</option>
                        <?php
                            $requete = $connection->query("select * from marques_noms");
                            for($i = 0; $i < $requete->num_rows; $i++){
                                $requete->data_seek($i);
                                $row = $requete->fetch_assoc();
                                echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['Marque'] . ">" . $row['Marque'] . "</option>";
                            }
                        ?>
                    </select>
                    <input name = "Modele" type = "text" class = "formulaire" placeholder = "Saisir le modèle" required pattern = "[^()']{1,50}"><br/>
                    <input name = "Prix" type = "text" class = "formulaire" placeholder = "Saisir le prix/Jour" required pattern = "[0-9]{1,5}"><br/>
                    <label class = "Text" style = "font-size: 16px;">La mise en circulation</label>
                    <input name = "Circulation" type = "date" class = "formulaire" required style = "width: 140px; padding-right: 0px;"><br/>
                    <input name = "CO2" type = "text" class = "formulaire" placeholder = "L'émission CO2 (g/Km)" required pattern = "[0-9]{1,5}"><br/>
                    <input name = "PuissanceReelle" type = "text" class = "formulaire" placeholder = "La puissance réelle en CH" required pattern = "[0-9]{1,5}"><br/>
                    <input name = "PuissanceFiscale" type = "text" class = "formulaire" placeholder = "La puissance fiscale en CV" required pattern = "[0-9]{1,5}"><br/>
                    <input name = "Portes" type = "text" class = "formulaire" placeholder = "Le nombre de portes" required pattern = "[0-9]{1,5}"><br/>
                    <input name = "Places" type = "text" class = "formulaire" placeholder = "Le nombre de places" required pattern = "[0-9]{1,5}"><br/>
                    <input name = "largeur" type = "text" class = "formulaire" placeholder = "La largeur" required pattern = "[0-9]{1,5}"><br/>
                    <input name = "Longueur" type = "text" class = "formulaire" placeholder = "Le longueur" required pattern = "[0-9]{1,5}"><br/>
                    <label class = "Text" id = "label">Ecrire une description sur la voiture</label><br/>
                    <textarea name = "Description" class = "formulaire"></textarea><br/>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" class = "formulaire" value = "Continuer">
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#Pays").change(function(){
            var langage = $('#Pays').children("option:selected").val();
            var Ville1 = 
            {
                Ville : langage
            }
            var Ville = JSON.stringify(Ville1);
            $.post("AJAX/Ville.php", {u:Ville}).then(function(data){
                $('#Ville').html(data);
            });
        });
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
        
        $("#BouttonConnexion").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#BouttonConnexion").mouseleave(function(){
            $(this).css("background-color", "rgb(26, 115, 232)");
        });
    });
</script>