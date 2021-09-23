<?php
    session_start();
    if(isset($_SESSION["email"])){
        header('location:PageAccueil.php');
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
    <link rel = "stylesheet" href="CSS/PageCreaerCompte.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundConnexion">
            <center>
                <p class = "Text">
                    Veuillez remplir ces informations
                </p>
                <form action = "PageSeConnecter.php" method = "POST" enctype = "multipart/form-data">
                    <input type = "text" name = "nom" class = "formulaire" placeholder = "Saisir votre nom" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "text" name = "prenom" class = "formulaire" placeholder = "Saisir votre prénom" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "email" id = "adresse" name = "adresse" class = "formulaire" placeholder = "Saisir une adresse électronique" required><br/>
                    <input type = "password" id = "mot_de_passe" name = "mot_de_passe" class = "formulaire" placeholder = "Saisir un mot de passe" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "password" id = "mot_de_passe_a_nouveau" name = "mot_de_passe_a_nouveau" class = "formulaire" placeholder = "Réécrir le mot de passe à nouveau" required pattern = "[^()'%!,=&$*+]{1,50}"><br/>
                    <input type = "tel" name = "telephone" class = "formulaire" placeholder = "Saisir votre numéro de téléphone" required pattern = "[0-9]{8,13}"><br/>
                    <div id = "DivImportation">
                        <label class = "Text" id = "label">Importez votre image</label>
                        <input id = "BoutonImporter" type = "file" name = "BoutonImporter" required/><br/>
                    </div>
                    <div id = "DivConnexion">
                        <div id = "BouttonEnvoyer">
                            <input type = "submit" id = "BouttonConnexion" name = "BouttonConnexion" class = "formulaire" value = "Continuer">
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
        $("form").submit(function(e){
            e.preventDefault();
            if($('#mot_de_passe').val() != $("#mot_de_passe_a_nouveau").val()){
                alert("Les deux mot de passes que vous avez inséré ne sont pas cohérents");
                $('#mot_de_passe_a_nouveau').val("");
                $('#mot_de_passe_a_nouveau').trigger("focus");
            }
            else{
                var adresse = {
                    adresse : $('#adresse').val()
                }
                var adr = JSON.stringify(adresse);
                $.post("AJAX/ComparerAdressePourCreerCompte.php", {u:adr}).then(function(data){
                    if(data == 0){
                        alert("Il y'a déja un utilisateur qui possède adresse que vous avez inséré!");
                        $('#adresse').val("");
                    }
                    else{
                        $("form").unbind('submit').submit();
                    }
                });
            }
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