<?php
    include("../Connexion.php");
    include("../Publicite.php");
    if(isset($_POST['u'])){
        $nombre = $_POST['u'];
        $u = json_decode($nombre);
        $n = $u->nbre;
        $Condition = "Pays = \"".$u->Pays."\" ";
        if($u->Ville != 0){
            $Condition = $Condition . " && Ville = '".$u->Ville."'";
        }
        if($u->DateRetrait != 0){
            $Condition = $Condition . " && (DateDebutDisponible IS NULL || DateDebutDisponible <= '".$u->DateRetrait."')";
        }
        if($u->DateRetour != 0){
            $Condition = $Condition . " && (DateFinDisponible IS NULL || DateFinDisponible >= '".$u->DateRetour."')";
        }
        if($u->Marque != 0){
            $Condition = $Condition . " && Marque = '".$u->Marque."'";
        }
        $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE $Condition ORDER BY NombreVisites DESC LIMIT 5 OFFSET $n;");
        for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
            $RequeteFiltre->data_seek($i);
            $RowFiltre = $RequeteFiltre->fetch_assoc();
            Publicite($RowFiltre['id']);
        }
    }
    if(isset($_POST['v'])){
        $nombre = $_POST['v'];
        $v = json_decode($nombre);
        $n = $v->nbre;
        $RequeteFiltre = $connection->query("SELECT * FROM `informations` WHERE AdresseUtilisateur = (SELECT AdresseUtilisateur FROM `informations` WHERE id = '$v->id') ORDER BY NombreVisites DESC LIMIT 5 OFFSET $n;");
        for($i = 0; $i < $RequeteFiltre->num_rows; $i++){
            $RequeteFiltre->data_seek($i);
            $RowFiltre = $RequeteFiltre->fetch_assoc();
            Publicite($RowFiltre['id']);
        }
    }
?>