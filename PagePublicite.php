<?php
    if(isset($_POST["email"], $_POST["password"])){
        echo '
            <form id = "HiddenModifierTemps" action = "PageModifierTemps.php" method = "POST">
                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                <input type = "hidden" name = "id" value = "'.$_POST["id"].'" />
            </form>
        ';
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
    <link rel = "stylesheet" href="CSS/PagePublicite.css"/>
</head>
<body>
    <div id = "ApresMenu">
        <div id = "BackgroundPublicite">
            <?php
            $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
            $connection->set_charset("utf8");
            mysqli_set_charset($connection, "utf8");/*Cette ligne et la ligne qui est au dessus sont les résponsables à lire les caractères accentiés*/
            $requete = $connection->query("select * from informations where id = '".$_POST['id']."';");
            $requete2 = $connection->query("select * from utilisateurs where Adresse = (SELECT AdresseUtilisateur FROM informations WHERE id = '".$_POST['id']."');");
            $requete3 = $connection->query("select * from imagesvoitures where id = '".$_POST['id']."' ORDER BY NUM;");
            $requete->data_seek(0);
            $requete2->data_seek(0);
            $row = $requete->fetch_assoc();
            $row2 = $requete2->fetch_assoc();
            if(!isset($_POST["Ne_vient_pas_de_la_page_publicite"])){
                $connection->query("UPDATE `informations` SET NombreVisites = '".$_POST['NombreVisites']."'+1 WHERE id = '".$_POST['id']."';");
            }
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
                else{
                    echo "La date de début doit être avant la date de fin";
                }
                $connection = NULL;
            }
            ?>
            <script>
                var a = "<?php $requete3->data_seek(0); $row3 = $requete3->fetch_assoc(); $image = $row3['CheminImage']; echo $row3['CheminImage']; ?>";
                var n = "<?php $requete3->data_seek(0); $row3 = $requete3->fetch_assoc(); $image = $row3['CheminImage']; echo $requete3->num_rows; ?>";
                n = Number(n);
                var debut, fin;
                for(var i = 0; i<a.length; i++){
                    if(a[i] == '/'){
                        debut = i+1;
                    }
                    if(a[i] == '.'){
                        fin = i;
                    }
                }
                var m_initial = Number(a.substring(debut, fin));
                function MouvoirGauche(){
                    for(var i = 0; i<a.length; i++){
                        if(a[i] == '/'){
                            debut = i+1;
                        }
                        if(a[i] == '.'){
                            fin = i;
                        }
                    }
                    var m = m_initial + (Number(a.substring(debut, fin)) - 1 - m_initial + n)%n;
                    a = a.substring(0, debut) + m.toString(10) + a.substring(fin, a.length);
                    DivPourFleche.innerHTML = '<img src = "' + a + '" id = "ImagePublicite" />';
                }
                function MouvoirDroite(){
                    for(var i = 0; i<a.length; i++){
                        if(a[i] == '/'){
                            debut = i+1;
                        }
                        if(a[i] == '.'){
                            fin = i;
                        }
                    }
                    var m = m_initial + (Number(a.substring(debut, fin)) + 1 - m_initial)%n;
                    a = a.substring(0, debut) + m.toString(10) + a.substring(fin, a.length);
                    DivPourFleche.innerHTML = '<img src = "' + a + '" id = "ImagePublicite" />';
                }
            </script>
            <div id = "Publicite1ereParagraphe">
                <div id = "divImagePublicite">
                    <div id = "DivPourFleche">
                        <img src = "<?php
                            echo $row3['CheminImage'];
                        ?>" id = "ImagePublicite" />
                    </div>
                    <img onclick = "MouvoirGauche()" src = "Images/Gauche.png" id = "FlecheGauche" />
                    <img onclick = "MouvoirDroite()" src = "Images/Droite.png" id = "FlecheDroite" />
                </div>
                <div id = "ComptePublicite">
                    <?php
                        echo '
                            <form id = "HiddenProfil" action = "PageProfil.php" method = "POST">
                                <input type = "hidden" name = "id" value = "'.$_POST["id"].'" />
                            ';
                        if(isset($_POST["email"], $_POST["password"])){
                            echo '
                                <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
                                <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
                            ';
                        }
                        echo '</form>';
                    ?>
                    <a href = "#" OnClick = "document.getElementById('HiddenProfil').submit()">
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
                        if($row['DateDebutDisponible'] == NULL && $row['DateFinDisponible'] == NULL){
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
                <?php if(isset($_POST["email"], $_POST["password"]) && $row["AdresseUtilisateur"] == $_POST["email"]){ ?>
                <div class = "DDivOptionsMenu" id = "DDivOptioneMenuSeConnecter">
                    <a href = "#" OnClick = "document.getElementById('HiddenModifierTemps').submit()" style = "text-decoration: none;">
                        <img src = "Images/Temps.png" id = "IImageUtilisateur"/>
                        <p class = "OOptionsMenu"> Modifier les dates </p>
                    </a>
                </div>
                <?php } ?>
            </div>
            <div id = "Publicite3emeParagraphe">
                <div id = "Publicite3emeParagrapheLeft">
                    <p class = "TitresPublicite">Pays :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Pays'];?></p><br/>
                    <p class = "TitresPublicite">Marque :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Marque'];?></p></br>
                    <p class = "TitresPublicite">Prix   :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Prix'];?></p>
                    <p  class = "ValeursPublicite" id = "DH_jour">DH / jour</p>
                </div>
                <div id = "Publicite3emeParagrapheRight">
                    <p class = "TitresPublicite">Ville :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Ville'];?></p><br/>
                    <p class = "TitresPublicite">Modèle :</p>
                    <p class = "ValeursPublicite"><?php echo $row['Modele'];?></p></br>
                    <p class = "TitresPublicite">Téléphone :</p>
                    <p class = "ValeursPublicite"><?php echo $row2['Telephone'];?></p>
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