<?php
    include("UploaderImage.php");
    include("Publicite.php");
    $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
    $connection->set_charset("utf8");
    mysqli_set_charset($connection, "utf8");
    if (isset($_POST["email"], $_POST["password"])){
        $mail = $_POST["email"];
        $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$mail."';");
        $requete->data_seek(0);
        $row = $requete->fetch_assoc();
        if($_POST["password"] != $row["MotDePasse"]){
            header('location:PageSeConnecter.php');
            echo "Quelque chose qui ne va pas!!!!";
        }
    }
    if(isset($_POST["Numero"])){
        $Numero = $_POST["Numero"];
    }
    else{
        $Numero = 0;
    }
    echo '
        <form id = "PageSuivante" action = "PageAccueil.php" method = "POST">
            <input type = "hidden" name = "Numero" value = "'.($Numero + 5).'" />
        ';
        if(isset($_POST['Pays'])){
            echo '<input type = "hidden" name = "Pays" value = "'.$_POST['Pays'].'" />';
        }
        if(isset($_POST['DateRetrait'])){
            echo '<input type = "hidden" name = "DateRetrait" value = "'.$_POST['DateRetrait'].'" />';
        }
        if(isset($_POST['DateRetour'])){
            echo '<input type = "hidden" name = "DateRetour" value = "'.$_POST['DateRetour'].'" />';
        }
        if(isset($_POST['Marque'])){
            echo '<input type = "hidden" name = "Marque" value = "'.$_POST['Marque'].'" />';
        }
        if(isset($_POST["email"], $_POST["password"])){
            echo '
                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
            ';
        }
    echo '</form>';
    function AjouterPublicites($n, $connection){
        if(isset($_POST['Pays'])){
            $Condition = "Pays = '".$_POST['Pays']."'";
            if($_POST['DateRetrait']){
                $Condition = $Condition . " && (DateDebutDisponible = NULL || DateDebutDisponible <= '".$_POST['DateRetrait']."')";
            }
            if($_POST['DateRetour']){
                $Condition = $Condition . " && (DateFinDisponible = NULL || DateFinDisponible >= '".$_POST['DateRetour']."')";
            }
            if(isset($_POST['Marque'])){
                $Condition = $Condition . " && Marque = '".$_POST['Marque']."'";
            }
            $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE $Condition ORDER BY NombreVisites DESC LIMIT 5 OFFSET $n;");
            for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
                $RequeteFiltre->data_seek($i);
                $RowFiltre = $RequeteFiltre->fetch_assoc();
                Publicite($RowFiltre['id']);
            }
            return $RequeteFiltre->num_rows;
        }
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
    <link rel = "stylesheet" href="CSS/PageAccueil.css"/>
    <link rel = "stylesheet" href="CSS/LaPublicite.css"/>
</head>
<body>
    <center id = "ApresMenu">
        <form action = "PageAccueil.php" method = "POST" id = "FormulaireAccueil">
            <select class = "formulaire" id = "formulaire1" name = "Pays" required>
                <option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir le pays</option>
                <?php
                    $requete = $connection->query("SELECT * FROM `pays`");
                    for($i = 0; $i < $requete->num_rows; $i++){
                        $requete->data_seek($i);
                        $row = $requete->fetch_assoc();
                        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['pays'] . ">" . $row['pays'] . "</option>";
                    }
                ?>
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
                        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = " . $row['Marque'] . ">" . $row['Marque'] . "</option>";
                    }
                ?>
            </select>
            <?php
                if(isset($_POST["email"], $_POST["password"])){
                    echo '
                        <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                        <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                    ';
                }
            ?>
            <input type = "submit" value = "Envoyer"  class = "formulaire" id = "formulaire5"/>
        </form>
        <img src="Images/image de recherche.png" id = "image_LocationDeVoitures"/>
    </center>
    <?php
        $limit = AjouterPublicites($Numero, $connection);
    ?>
    <style>
#DivAutresPublicites{
    background-color : rgb(200, 200, 200);
    border-color: rgb(150, 150, 150);
    border-radius: 5px;
    border-style: solid;
    border-width: 1px;
    margin-top: 7.5px;
    padding-left: 7.5px;
    padding-right: 7.5px;
    display: inline-block;
}
#ImageAutresPublicites{
    /*background-color: green;*/
    height: 25px;
    display: inline-block;
    margin-top: 1px;
    margin-bottom: -3px;
}
#AutresPublicites{
    /*background-color: red;*/
    font-family:Georgia, 'Times New Roman', Times, serif;
    vertical-align: middle;
    display: inline-block;
    margin-top: -12px;
    margin-bottom: 1px;
}
</style>
    <center id = "CenterBoutonAjouterBublicite">
        <div id = "DivAutresPublicites">
            <a href = "#" OnClick = "document.getElementById('PageSuivante').submit()" style = "text-decoration: none;">
                <img src = "Images/AjouterPlusDePublicites.png" id = "ImageAutresPublicites"/>
                <p id = "AutresPublicites">Page suivante</p>
            </a>
        </div>
    </center>
</body>
</html>
<?php
    if($limit<5){
        echo "<script> CenterBoutonAjouterBublicite.innerHTML = ''; </script>";
    }
    $connection = NULL;
?>