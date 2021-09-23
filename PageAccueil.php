<?php
    session_start();
    if(isset($_POST["Deconnexion"])){
        unset($_SESSION["email"]);
    }
    include("Connexion.php");
    include("UploaderImage.php");
    include("Publicite.php");
    if (isset($_POST["email"], $_POST["password"])){
        $mail = $_POST["email"];
        $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$mail."';");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        if($_POST["password"] != $row["MotDePasse"]){
            header('location:PageSeConnecter.php');
        }
        else{
            $_SESSION["email"] = $_POST["email"];
        }
    }
    if(isset($_GET['Pays'])){
        echo '<input id = "Cache" type = "hidden" name = "Pays" value = "'.$_GET['Pays'].'" />';
    }
    if(isset($_GET['Ville'])){
        echo '<input type = "hidden" name = "Ville" value = "'.$_GET['Ville'].'" />';
    }
    if(isset($_GET['DateRetrait'])){
        echo '<input type = "hidden" name = "DateRetrait" value = "'.$_GET['DateRetrait'].'" />';
    }
    if(isset($_GET['DateRetour'])){
        echo '<input type = "hidden" name = "DateRetour" value = "'.$_GET['DateRetour'].'" />';
    }
    if(isset($_GET['Marque'])){
        echo '<input type = "hidden" name = "Marque" value = "'.$_GET['Marque'].'" />';
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
    <link rel = "stylesheet" href="CSS/PageAccueil.css"/>
    <link rel = "stylesheet" href="CSS/LaPublicite.css"/>
    <script src = "JavaScript/jquery-3.6.0.js"></script>
</head>
<body>
    <header>
        <?php include("Menu.php"); ?>
    </header>
    <div id = "ApresMenu">
        <img src="Images/image de recherche.png" id = "image_LocationDeVoitures"/>
        <form action = "PageAccueil.php" method = "GET" id = "FormulaireAccueil">
            <center>
                <select class = "formulaire" id = "formulaire1" name = "Pays" required>
                    <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir le pays</option>
                    <?php
                        $requete = $connection->query("SELECT * FROM `pays` ORDER BY pays");
                        for($i = 0; $i < $requete->num_rows; $i++){
                            $requete->data_seek($i);
                            $row = $requete->fetch_assoc();
                            echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = \"" . $row['pays'] . "\">" . $row['pays'] . "</option>";
                        }
                    ?>
                </select><br/><br/>
                <select class = "formulaire" id = "forulaire1_5" name = "Ville">
                    <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la ville</option>
                </select>
                <div class = "divDate">
                    <div class = "PhraseDate" id = "PhraseDate1">Date de retrait</div>
                    <input type = "date" placeholder = "Date" id = "formulaire2" class = "formulaire" name = "DateRetrait"/><br/>
                </div>
                <div class = "divDate">
                    <div class = "PhraseDate" id = "PhraseDate2">Date de retour</div>
                    <input type = "date" placeholder = "Date" id = "formulaire3" class = "formulaire" name = "DateRetour"/><br/>
                </div>
                <br/>
                <select class = "formulaire" id = "formulaire4" name = "Marque">
                    <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir la marque</option>
                    <?php
                        $requete = $connection->query("SELECT * FROM `marques_noms` ORDER BY 'Marque'");
                        for($i = 0; $i < $requete->num_rows; $i++){
                            $requete->data_seek($i);
                            $row = $requete->fetch_assoc();
                            echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = '" . $row['Marque'] . "' >" . $row['Marque'] . "</option>";
                        }
                    ?>
                </select>
                <input type = "submit" value = "Envoyer"  class = "formulaire" id = "formulaire5"/>
            </center>
        </form>
    </div>
    <div id = "AjouterPublicites">
        <?php
            $len = AjouterPublicites(0, $connection);
        ?>
    </div>
    <style>
</style>
    <div id = "CenterBoutonAjouterBublicite">
        <a id = "PageSuivante" style = "text-decoration: none;">
            <img src = "Images/AjouterPlusDePublicites.png" id = "ImageAutresPublicites"/>
            <p id = "AutresPublicites">Page suivante</p>
        </a>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#formulaire1").change(function(){
            var langage = $('#formulaire1').children("option:selected").val();
            var Ville1 = 
            {
                Ville : langage
            }
            var Ville = JSON.stringify(Ville1);
            $.post("AJAX/Ville.php", {u:Ville}).then(function(data){
                $('#forulaire1_5').html(data);
            });
        });
        var i = 0;
        var len = "<?php echo $len; ?>";
        if(!len || i + 5 >= len){
            $("#CenterBoutonAjouterBublicite").hide();
        }
        $("#PageSuivante").click(function(){
            i += 5;
            var Pays = "<?php
                if(isset($_GET['Pays'])){
                    echo $_GET['Pays'];
                }
                else{
                    echo 0;
                }
            ?>";
            var Ville = "<?php
                if(isset($_GET['Ville'])){
                    echo $_GET['Ville'];
                }
                else{
                    echo 0;
                }
            ?>";
            var DateRetrait = "<?php
                if(isset($_GET['DateRetrait']) && $_GET['DateRetrait']){
                    echo $_GET['DateRetrait'];
                }
                else{
                    echo 0;
                }
            ?>";
            var DateRetour = "<?php
                if(isset($_GET['DateRetour']) && $_GET['DateRetour']){
                    echo $_GET['DateRetour'];
                }
                else{
                    echo 0;
                }
            ?>";
            var Marque = "<?php
                if(isset($_GET['Marque'])){
                    echo $_GET['Marque'];
                }
                else{
                    echo 0;
                }
            ?>";


            var nbre = {
                nbre : i,
                Pays : Pays,
                Ville : Ville,
                DateRetrait : DateRetrait,
                DateRetour : DateRetour,
                Marque : Marque
            }
            var nombre = JSON.stringify(nbre);
            $.post("AJAX/AjouterPubliciters.php", {u:nombre}).then(function(data){
                $('#AjouterPublicites').append(data);
                size = $(window).width();
                if(size<1000){
                    $(".BackgroundPublicite").css({"margin-left" : "100px",
                                                    "width" : "800px"
                                                    });
                }
                else{
                    $(".BackgroundPublicite").css({"margin-left" : "10%",
                                                "width" : "80%"
                                                });
                }
            });
            if(i + 5 >= len){
                $("#CenterBoutonAjouterBublicite").hide();
            }
            //Pour donner la vraie taille des publications qui vont être ajoutés.
        });


        var size = $(window).width();
        if(size<1000){
            $("#FormulaireAccueil").css("margin-left", "200px");
            $("#CenterBoutonAjouterBublicite").css("margin-left", "420px");
            $(".BackgroundPublicite").css({"margin-left" : "100px",
                                            "width" : "800px"
                                            });
        }
        else{
            $("#FormulaireAccueil").css("margin-left", "auto");
            $("#CenterBoutonAjouterBublicite").css({"margin-left" : "auto", "margin-right" : "auto"});
            $(".BackgroundPublicite").css({"margin-left" : "10%",
                                        "width" : "80%"
                                        });
        }
        $(window).on('resize', function(){
            size = $(window).width();
            if(size<1000){
                $("#FormulaireAccueil").css("margin-left", "200px");
                $("#CenterBoutonAjouterBublicite").css("margin-left", "420px");
                $(".BackgroundPublicite").css({"margin-left" : "100px",
                                                "width" : "800px"
                                                });
            }
            else{
                $("#FormulaireAccueil").css("margin-left", "auto");
                $("#CenterBoutonAjouterBublicite").css({"margin-left" : "auto", "margin-right" : "auto"});
                $(".BackgroundPublicite").css({"margin-left" : "10%",
                                            "width" : "80%"
                                            });
            }
        });

        $("#CenterBoutonAjouterBublicite").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#CenterBoutonAjouterBublicite").mouseleave(function(){
            $(this).css("background-color", "rgb(17, 106, 179)");
        });

        $("#formulaire5").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#formulaire5").mouseleave(function(){
            $(this).css("background-color", "rgba(250, 128, 114, 0.568)");
        });
    });
</script>