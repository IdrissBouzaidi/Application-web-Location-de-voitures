<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma page WEB</title>
    <link rel = "stylesheet" href="CSS/fichier.css"/>
</head>
<body>
    <div id = "menu">
        <a href="php.php" style="display: inline-block;">
            <img src = "Images/accueil.png" id = "ImageAccueil"/>
        </a>
        <p id = "OptionsMenu1">Rechercher</p>
        <p id = "OptionsMenu2">Déposer une annonce</p>
        <p id = "OptionsMenu3">Se connecter</p>
    </div>
</body>
</html>


















<?php
echo "<br/><br/><br/><br/><br/><br/><br/><br/>";
echo "Bonjour tout le monde !";
$x = 10;
echo $x;
function f(){
    static $x;
    $x = 5;
    echo $x;
}
f();
echo $x;
$x = "Idriss";
$$x = 2;
echo $x;
echo $$x;
echo $Idriss;
$x = 10.5e-3;
echo $x;
$x = "\rIdriss est ${x}";
echo $x;
$x = <<<FIN
Salut les amis \n \r
Comment ça va ?
FIN;
echo $x;
$x.="hhhhhh";
$x = $x.="H\n";
echo $x;/*
class test{
    function Hello(){
        echo "Hollo man !";
    }
}
$objet = new test;
$objet->Hello();*/
define('abdo',"valeur\n");
echo abdo;
echo gettype(abdo);
echo " ";
echo isset($y);
$x = 1;
if($x == 1):
    print("\n\nLa valeur alors est correcte !!");
endif;
$x = 0;
while($x != 10):
    echo $x;
    $x += 1;
endwhile;
for($i = 0; $i < 10; $i ++, print $i):
endfor;
echo "<br>";
$T = array("un" => 1, "deux" => 2, "trois" => 3);
foreach($T as $i => $k):
    echo nl2br("\$T[$i] = $k\n");
endforeach;
include("include.php");
echo $a;
?>
<?php
    function fa(&$x){
        $x = "<br>Hello Idriss";
        return 15;
    }
    $a = 8;
    echo fa($a);
    echo $a;
    echo "<br>";
    echo "Voici ton adresse : ";
    echo $_POST["adresse"];
    echo "<br>";
    echo "Voici ton mot de passe : ";
    echo "<br>";
    echo date("h:m : s, \l\\e \j\o\u\\r \d\a\\n\s \l\'\a\\n\\n\é\\e \\e\s\\t : z");
    echo "<br>";
    echo strtotime("now");
    echo "<br>";
    echo strtotime("-1 day");
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = new PDO('mysql:host=localhost;dbname=corona', $user, $pass);
    if(!$db):
        echo "<br>Une erreur s'est produit<br>";
    else:
        echo "<br>Il n y'a aucune erreur !!<br>";
    endif;
    $db = NULL;
    $connection = new mysqli("localhost", "root", "", "corona");
    $connection->query("create database DBessay;");
    $connection->query("drop database DBessay;");
    $connection->query("insert into `pays`(pays, codepays) values('Anass', 'ANS')");



    $requete = $connection->query("select * from pays where pays like '%al%'");
    for($i = 0; $i < $requete->num_rows; $i++){
        $requete->data_seek($i);
        $row = $requete->fetch_assoc();
        echo "Pays = " . $row['pays'] . "<br>";
    }


    $fff = "Untitled-1.txt";
    if(!file_exists($fff)){
        die("Le fichier n'existe pas");
    }
    else{
        $fichier = fopen($fff, "r+");
    }
    $file = fread($fichier, filesize($fff));
    echo $file;
    fclose($fichier);
?>