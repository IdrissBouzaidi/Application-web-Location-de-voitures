<?php
    include("Connexion.php");
    function AjouterPublicites($n, $connection){
        if(isset($_GET['Pays'])){
            $Condition = "Pays = \"".$_GET['Pays']."\" ";
            if(isset($_GET['Ville'])){
                $Condition = $Condition . " && Ville = '".$_GET['Ville']."'";
            }
            if($_GET['DateRetrait']){
                $Condition = $Condition . " && (DateDebutDisponible IS NULL || DateDebutDisponible <= '".$_GET['DateRetrait']."')";
            }
            if($_GET['DateRetour']){
                $Condition = $Condition . " && (DateFinDisponible IS NULL || DateFinDisponible >= '".$_GET['DateRetour']."')";
            }
            if(isset($_GET['Marque'])){
                $Condition = $Condition . " && Marque = '".$_GET['Marque']."'";
            }
            $len = $connection->query("SELECT * FROM `informations` WHERE $Condition;")->num_rows;
            $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE $Condition ORDER BY NombreVisites DESC LIMIT 5 OFFSET $n;");
            for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
                $RequeteFiltre->data_seek($i);
                $RowFiltre = $RequeteFiltre->fetch_assoc();
                Publicite($RowFiltre['id']);
            }
            return $len;
        }
    }
    function Publicite($id){
        include("Connexion.php");
?>
<link rel = "stylesheet" href="CSS/LaPublicite.css"/>
<?php
    $requete = $connection->query("select * from informations where id = '$id';");
    $requete->data_seek(0);
    $row = $requete->fetch_assoc();
    date_default_timezone_set('Africa/Casablanca');
    $DateActuel = date('Y-m-d', time());
    if($row['DateDebutDisponible'] != NULL && $row['DateDebutDisponible']<=$DateActuel){
        $connection->query("UPDATE informations SET DateDebutDisponible = NULL WHERE id = $id;");
    }

    $requete = $connection->query("select * from informations where id = '$id';");//On a redéclaré la variable $requete pour qu'on mette à jour les changements qu'on a peut être fait à DateDebutDisponible
    $requete3 = $connection->query("select * from imagesvoitures where id = '$id' ORDER BY NUM;");
    $requete->data_seek(0);
    $requete3->data_seek(0);
    $row = $requete->fetch_assoc();
    $row3 = $requete3->fetch_assoc();
    echo '
        <form id = "'.$id.'" action = "PagePublicite.php?id=' . $id . '" method = "POST">
            <input type = "hidden" name = "NombreVisites" value = "'.$row["NombreVisites"].'" />
        </form>';
?>
<div id = "BackgroundPublicite" class = "BackgroundPublicite">
    <a href = "#" id = "<?php echo $id; ?>" OnClick = "var a = document.getElementById(this.id); a.submit()" style = "text-decoration: none;">
        <img src = "<?php echo $row3['CheminImage']; ?>" id="ImagePublicite" class = "ImagePublicite" />
        <div id = "DivNonImage" class = "DivNonImage">
            <div id = "DivText1Publicite" class = "DivText1Publicite">
                <div class = "ValeursPublicite" style = "font-size: 25px; padding-left: 10px;">
                    <p class = "TitresPublicite">Pays :</p>    
                    <?php echo $row['Pays'];?>
                </div><br/>
                <div class = "ValeursPublicite" style = "font-size: 25px; padding-left: 10px;">
                    <p class = "TitresPublicite">Marque :</p>
                    <?php echo $row['Marque']; ?>
                </div>
            </div>
            <div id = "DivText2Publicite" class = "DivText2Publicite">
                <div class = "ValeursPublicite">
                    <p class = "TitresPublicite">Ville :</p>
                    <?php echo $row['Ville'];?>
                </div><br/>
                <div class = "ValeursPublicite" style = "font-size: 20px;">
                    <p class = "TitresPublicite">Modèle :</p>
                    <?php echo $row['Modele'];?>
                </div>
            </div>
            <div id = "DivText3Publicite">
                <p class = "TitresPublicite Prix_et_Occupation_et_leurs_valeurs">Prix   :</p>
                <p class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs"><?php echo $row['Prix'];?></p>
                <p  class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs" id = "DH_jour">DH / jour</p>
                <hr noshade align="left" id = "Ligne_horizontal_Publicite">
                <div id = "DivLigneOccupation">
                    <p class = "TitresPublicite Prix_et_Occupation_et_leurs_valeurs" style = "vertical-align: middle; margin-bottom: 10px;">Occupation :</p>
                    <?php
                        if($row["DateDebutDisponible"] == NULL && $row["DateFinDisponible"] >= $DateActuel){
                    ?>
                    <img src = "Images/Disponible.png" id = "ImageDisponible"/>
                    <?php
                        }
                        else{
                    ?>
                    <p class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs">Occupée pour le moment</p>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </a>
</div>
<?php
    }
?>