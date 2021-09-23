<?php
    include("../Connexion.php");
    $Ville = $_POST['u'];
    $u = json_decode($Ville);
    $pays = $u->Ville;
    echo '<option value="" disabled selected style = "background-color: rgba(200, 200, 200, 255);">Choisir une ville de ' . $pays . '</option>';
    $requete = $connection->query("SELECT * FROM `villes` WHERE Pays = \"".$pays."\";");
    echo "SELECT * FROM `villes` WHERE Pays = \"".$pays."\" ;";
    for($i = 0; $i < $requete->num_rows; $i++){
        $requete->data_seek($i);
        $row = $requete->fetch_assoc();
        echo "<option style = 'background-color: rgba(230, 230, 230, 0.8);' value = '" . $row['Ville'] . "'>" . $row['Ville'] . "</option>";
    }
?>