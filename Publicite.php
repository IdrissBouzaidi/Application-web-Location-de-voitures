<?php
    function Publicite($id){
?>
<link rel = "stylesheet" href="CSS/LaPublicite.css"/>
<?php
    $connection = new mysqli("localhost", "root", "", "applicationweblocationdevoitures");
    $connection->set_charset("utf8");
    mysqli_set_charset($connection, "utf8");
    $requete = $connection->query("select * from pays");
?>
<?php
    $requete = $connection->query("select * from informations where id = '$id';");
    $requete3 = $connection->query("select * from imagesvoitures where id = '$id' ORDER BY NUM;");
    $requete->data_seek(0);
    $requete3->data_seek(0);
    $row = $requete->fetch_assoc();
    $row3 = $requete3->fetch_assoc();
    echo '
        <form id = "'.$id.'" action = "PagePublicite.php" method = "POST">
            <input type = "hidden" name = "id" value = "'.$id.'" />
            <input type = "hidden" name = "NombreVisites" value = "'.$row["NombreVisites"].'" />
    ';
    if(isset($_POST["email"], $_POST["password"])){
        echo '
            <input type = "hidden" name = "email" value = "'.$_POST["email"].'" />
            <input type = "hidden" name = "password" value = "'.$_POST["password"].'" />
        ';
    }
    echo '</form>';
?>
<a href = "#" id = "<?php echo $id; ?>" OnClick = "var a = document.getElementById(this.id); a.submit()" stype = "text-decoration: none;">
    <div id = "BackgroundPublicite">
        <img src = "<?php echo $row3['CheminImage']; ?>" id="ImagePublicite" />
        <div id = "DivNonImage">
            <div id = "DivText1Publicite">
                <p class = "TitresPublicite">Pays :</p>
                <p class = "ValeursPublicite"><?php echo $row['Pays'];?></p><br/>
                <p class = "TitresPublicite">Marque :</p>
                <p class = "ValeursPublicite"><?php echo $row['Marque'];?></p>
            </div>
            <div id = "DivText2Publicite">
                <p class = "TitresPublicite">Ville :</p>
                <p class = "ValeursPublicite"><?php echo $row['Ville'];?></p><br/>
                <p class = "TitresPublicite">Modèle :</p>
                <p class = "ValeursPublicite" style = "font-size: 20px;"><?php echo $row['Modele'];?></p>
            </div>
            <div id = "DivText3Publicite">
                <p class = "TitresPublicite Prix_et_Occupation_et_leurs_valeurs">Prix   :</p>
                <p class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs"><?php echo $row['Prix'];?></p>
                <p  class = "ValeursPublicite Prix_et_Occupation_et_leurs_valeurs" id = "DH_jour">DH / jour</p>
                <hr noshade align="left" id = "Ligne_horizontal_Publicite">
                <div id = "DivLigneOccupation">
                    <p class = "TitresPublicite Prix_et_Occupation_et_leurs_valeurs" style = "vertical-align: middle; margin-bottom: 10px;">Occupation :</p>
                    <?php
                        if($row["DateDebutDisponible"] == NULL){
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
    </div>
</a>
<?php
    }
?>