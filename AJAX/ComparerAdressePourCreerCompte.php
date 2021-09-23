<?php
    include("../Connexion.php");
    $adresse = $_POST['u'];
    $adresse = json_decode($adresse);
    $requete = $connection->query("SELECT * FROM `utilisateurs` WHERE Adresse = '".$adresse->adresse."';");
    $row = $requete->fetch_assoc();
    if(!$row["Adresse"] == NULL){
        echo 0;
    }
    else{
        echo 1;
    }

?>