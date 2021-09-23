<?php
    function GenererElementImage($n, $requete){
        $requete->data_seek($n);
        $row3 = $requete->fetch_assoc();
        $image = $row3['CheminImage'];
        return '<img class = "ImagePublicite" src = "'. $row3["CheminImage"] . '" />';
    }
    if(isset($_POST['u'])){
        $nombre = $_POST['u'];
        $u = json_decode($nombre);
        include("../Connexion.php");
        $requete3 = $connection->query("select * from imagesvoitures where id = '".$u->id."' ORDER BY NUM;");
        $n = $requete3->num_rows;
        if($u->gauche == 1){
            echo GenererElementImage(($u->nombre + 1)%$n, $requete3);
        }
        else if($u->gauche == 2){
            $nombre = $u->nombre - 1;
            while($nombre < 0){
                $nombre += $n;
            }
            echo GenererElementImage(($nombre)%$n, $requete3);
        }
        else{//Lorsqu'on ne clique sur aucune flèche.
            echo GenererElementImage(($u->nombre + $n - 1)%$n, $requete3);
            echo GenererElementImage(($u->nombre)%$n, $requete3);
            echo GenererElementImage(($u->nombre + 1)%$n, $requete3);
?>
<script src = "../JavaScript/jquery-3.6.0.js"></script>
<script>
    $(".ImagePublicite").css("display", "inline-block");
    $(".ImagePublicite").eq(0).css("margin-left", "-100%");
    $(".ImagePublicite").eq(2).css("margin-right", "-100%");
    $(".ImagePublicite").css("width", "100%");
</script>
<?php
        }
    }
?>