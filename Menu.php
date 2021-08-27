<link rel = "stylesheet" href="CSS/menu.css"/>
<?php
    if(isset($_POST["email"], $_POST["password"])){
        echo '
            <form id = "HiddenAccueil" action = "PageAccueil.php" method = "POST">
                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
            </form>
        ';
        echo '
            <form id = "HiddenDeposerPublicite" action = "PageDeposerUnePublicite.php" method = "POST">
                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
            </form>
        ';
        echo '
            <form id = "HiddenSeConnecter" action = "PageProfil.php" method = "POST">
                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
            </form>
        ';
        //echo $_POST['email'] . '<br/>';
        //echo $_POST['password'];

    $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
    $connection->set_charset("utf8");
    mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
    $mail = $_POST["email"];
    $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$_POST['email']."';");
    $requete->data_seek(0);
    $row = $requete->fetch_assoc();
    //echo "Le prénom est : " . $row['Prenom'] . "!!!<br/>";
    //$connection = NULL;
?>
<div id = "menu">
    <div id = "DivImage">
        <a href = "#" OnClick = "document.getElementById('HiddenAccueil').submit()">
            <img src = "Images/accueil.png" id = "ImageAccueil"/>
        </a>
    </div>
    <div class = "DivOptionsMenu" id = "DivOptionMenuDeposerAnnance">
        <img src = "Images/Uploader.png" id = "ImageDeposerAnnance"/>
        <a href = "#" OnClick = "document.getElementById('HiddenDeposerPublicite').submit()">
            <p class = "OptionsMenu" id = "OptionMenuDeposerAnnance">Déposer une publicité</p>
        </a>    
    </div>
    <div class = "DivOptionsMenu" id = "DivOptioneMenuSeConnecter">
        <img src = "<?php echo $row['Image']; ?>" id = "ImageUtilisateur"/>
        <a href = "#" OnClick = "document.getElementById('HiddenSeConnecter').submit()"><p class = "OptionsMenu" id = "OptioneMenuSeConnecter"> <?php echo $row['Prenom']; ?> </p></a>
    </div>
</div>
<?php
    }
    else{
        //echo 'Rien nest envoyé par la méthode POST';
?>
<div id = "menu">
    <div id = "DivImage">
        <a href = "PageAccueil.php">
            <img src = "Images/accueil.png" id = "ImageAccueil"/>
        </a>
    </div>
    <div class = "DivOptionsMenu" id = "DivOptionMenuDeposerAnnance">
        <img src = "Images/Uploader.png" id = "ImageDeposerAnnance"/>
        <a href = "PageSeConnecter.php">
            <p class = "OptionsMenu" id = "OptionMenuDeposerAnnance">Déposer une publicité</p>
        </a>    
    </div>
    <div class = "DivOptionsMenu" id = "DivOptioneMenuSeConnecter">
        <img src = "Images/Se connecter.png" id = "ImageSeConnecter"/>
        <a href = "PageSeConnecter.php"><p class = "OptionsMenu" id = "OptioneMenuSeConnecter">Se connecter</p></a>
    </div>
</div>
<?php
    }
?>