<link rel = "stylesheet" href="CSS/menu.css"/>
<script src = "JavaScript/jquery-3.6.0.js"></script>
<?php
    $connecte = 0;
    include("Connexion.php");
    if(isset($_SESSION["email"])){
        $mail = $_SESSION["email"];
        $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$_SESSION['email']."';");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        $connecte = 1;
    }
?>
<div id = "menu">
    <div id = "DivImage">
        <a href = "PageAccueil.php">
            <img src = "Images/accueil.png" id = "ImageAccueil"/>
        </a>
    </div>
    <div class = "DivOptionsMenu" id = "DivOptionMenuDeposerAnnance">
        <a href = "PageSeConnecter.php" style = "text-decoration: none">
            <img src = "Images/Uploader.png" id = "ImageDeposerAnnance"/>
            <p class = "OptionsMenu" id = "OptionMenuDeposerAnnance">Déposer une publicité</p>
        </a>
    </div>
    <ul style = "display: inline;">
        <li style = "display: inline;">
            <div class = "DivOptionsMenu" id = "DivOptioneMenuSeConnecter">
                <a href = "PageSeConnecter.php" style = "text-decoration: none; width: 100%;">
                    <img src = "Images/Se connecter.png" id = "ImageSeConnecter"/>
                    <p class = "OptionsMenu" id = "OptioneMenuSeConnecter">Se connecter</p>
                </a>
                <ul id = "choix">
                    <li><a href = "PageProfil.php?id=<?php echo $row['id'];?>" style = "text-decoration: none;"><p>Le profil</p></a></li>
                    <li><!--C'est la partie code correspondante à la déconnexion. -->
                        <a href = "#" OnClick = "document.getElementById('HiddenSeDeconnecter').submit()" style = "text-decoration: none;">
                            <p>Se déconnecter</p>
                        </a>
                        <form id = "HiddenSeDeconnecter" action = "PageAccueil.php" method = "POST">
                            <input type = "hidden" name = "Deconnexion" value = "Deconnexion" />
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
<script>
    $(document).ready(function(){
        $("#choix").hide();//Cacher les options données de la menu déroulandes
        var connecte = "<?php echo $connecte; ?>";
        if(connecte == "1"){
            jQuery("#OptioneMenuSeConnecter").prev().attr("id","ImageUtilisateur");
            $("#OptioneMenuSeConnecter").html("<?php if($connecte == 1){ echo $row['Prenom']; }?>");
            $("#ImageUtilisateur").attr("src", "<?php if($connecte == 1){ echo $row['Image']; }?>");
            $("#DivOptioneMenuSeConnecter").children("a").removeAttr("href");
            var longueur = $("#DivOptioneMenuSeConnecter").height();
            longueur = (60 - longueur - 2)/2;
            $("#DivOptioneMenuSeConnecter").css("margin-top", longueur);
            $("#DivOptionMenuDeposerAnnance").children("a").attr("href", "PageDeposerUnePublicite.php");
            $("#DivOptioneMenuSeConnecter").mouseenter(function(){
                $("#choix").show();
            });
        }

        //Pour changer la couleur de l'image d'acccueil lorsqu'on entre dedans.
        $("#ImageAccueil").mouseenter(function(){
            $(this).attr("src", "Images/accueil2.png");
        });
        $("#ImageAccueil").mouseleave(function(){
            $(this).attr("src", "Images/accueil.png");
        });
        //Fin
        //Pour changer la couleur de la barre "se connecter".
        $("#DivOptioneMenuSeConnecter").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
            $("#ImageSeConnecter").attr("src", "Images/Se connecter2.png");
        });
        $("#DivOptioneMenuSeConnecter").mouseleave(function(){
            $(this).css("background-color", "rgb(17, 106, 179)");
            $("#ImageSeConnecter").attr("src", "Images/Se connecter.png");
            $("#choix").hide();
        });
        //Fin
        //Pour changer la couleur des oprions données par la barre "Se connecter" lorsqu'on pase sur eux.
        $("#choix").children("li").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#choix").children("li").mouseleave(function(){
            $(this).css("background-color", "rgb(17, 106, 179)");
        });
        //Fin
        //Pour changer la couleur de la barre pour déposer une publicité quand on accède au menu.
        $("#DivOptionMenuDeposerAnnance").mouseenter(function(){
            $(this).css("background-color", "rgb(255, 110, 50)");
        });
        $("#DivOptionMenuDeposerAnnance").mouseleave(function(){
            $(this).css("background-color", "rgb(17, 106, 179)");
        });
        //Fin
    });
</script>